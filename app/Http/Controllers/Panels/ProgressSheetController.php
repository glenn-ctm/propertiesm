<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgressSheet;
use App\Models\ProgressSheetItem;
use App\Models\User;
use App\Rules\MonthYear;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ProgressSheetController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(ProgressSheet::class, 'progress_sheet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ProgressSheet::with('user')->orderBy('updated_at', 'desc');

        if (auth()->user()->is_property_owner()) {
            $query->where('user_id', auth()->user()->id);
        }

        if ((auth()->user()->is_admin() || auth()->user()->is_super_admin()) && $search = $request->input('search')) {
            $query->search($search);
        }

        return view('panel.pages.admin.progress-sheet.index', [
            'sheets' => $query->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->hasValidParam($request);
        $request->merge(['date' => implode('-', [$request->date, '1'])]);
        return view('panel.pages.admin.progress-sheet.create', [
            'nProgSheet' => $request->all(),
            'progSheetItems' => $this->defaultProgSheetItems(),
            'lsPerWeek' => [false, false, false, false],
            'scPerWeek' => [false, false, false, false],
            'formType' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage]
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sheet = $this->sheetRules($request);
        $this->sheetItemRules($request);
        $user = User::where('pin', $sheet->pin)->first();
        $ps = ProgressSheet::create([
            'user_id' => $user->id,
            'property_address' => $sheet->propertyAddress,
            'status' => $sheet->status,
            'comment' => $sheet->comment,
            'date' => $sheet->parsedDate,
            'ls_per_week' => $sheet->lsPerWeek,
            'sc_per_week' => $sheet->scPerWeek,
            'ls_amount_per_week' => $sheet->lsAmountPerWeek,
            'sc_amount_per_week' => $sheet->sCamountPerWeek,
        ]);
        foreach ($request->items as $item) {
            ProgressSheetItem::create([
                'unit' => $item['unit'],
                'cost' => $item['cost'],
                'rents' => $item['rents'],
                'repairs' => $item['repairs'],
                'progress_sheet_id' => $ps->id,
                'eviction' => $item['eviction'],
                'new_occupant' => $item['eviction'],
                'inspection' => $item['inspection'],
                'subc' => (bool) (isset($item['subc']) && ($item['subc'] === 'on' || $item['subc'])),
                'tl' => (bool) (isset($item['tl']) && ($item['tl'] === 'on' || $item['tl']))
            ]);
        }
        session()->flash('alertSuccess', 'Progress sheet was successfully created.');
        return redirect()->route('progress-sheets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProgressSheet $progressSheet)
    {
        $data = [
            'sheet' => $progressSheet,
            'items' => $progressSheet->items,
            'user' => $progressSheet->user
        ];

        if ($request->has('pdf-download')) {
            $logo64 = base64_encode(file_get_contents(public_path('/static/logo.png')));
            $logoSource = 'data:image/jpeg;base64,' . $logo64;

            $items = $data['items'];
            $sheet = $data['sheet'];

            $total = [
                'rents' => $items->sum('rents.rec'),
                'costs' => $items->sum('cost'),
                'inspections' => $items->sum('inspection.lcks') + $items->sum('inspection.leks') + $items->sum('inspection.seal') + $items->sum('inspection.sd') + $items->sum('inspection.extern'),
                'sc_per_week' => count($sheet->sc_per_week) * $sheet->sc_amount_per_week,
                // 'ls_per_week' => count($sheet->ls_per_week) * $sheet->ls_amount_per_week
                'ls_per_week' => $sheet->ls_amount_per_month
            ];
            $all_total = $total['rents'] - $total['costs'] - $total['inspections'] - $total['sc_per_week'] - $total['ls_per_week'];

            $pdf = \PDF::loadView(
                'panel.pages.admin.progress-sheet.pdf',
                array_merge(
                    $data,
                    compact('total', 'all_total')
                )
            )->setPaper('a4', 'landscape');
            return $pdf->download(time() . "-request-{$progressSheet->id}.pdf");
        }

        return view('panel.pages.admin.progress-sheet.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgressSheet $progressSheet)
    {
        $data = [
            'nProgSheet' => $progressSheet->getAttributes(),
            'sheet' => $progressSheet,
            'items' => $progressSheet->items,
            'user' => $progressSheet->user,
            'formType' => 'edit'
        ];
        return view('panel.pages.admin.progress-sheet.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressSheet $progressSheet)
    {
        $this->sheetRules($request);
        $this->sheetItemRules($request);

        $removedItems = [];

        $user = User::where('pin', $request->pin)->first();
        $progressSheet->property_address = $request->propertyAddress;
        $progressSheet->status =  $request->status;
        $progressSheet->comment = $request->comment;
        $progressSheet->ls_per_week = $request->lsPerWeek;
        $progressSheet->sc_per_week = $request->scPerWeek;
        $progressSheet->sc_amount_per_week = $request->sCamountPerWeek;
        $progressSheet->ls_amount_per_week = $request->lsAmountPerWeek;
        $progressSheet->user_id = $user->id;
        $progressSheet->save();

        $removedItems = json_decode($request->removedItems);
        if (!empty($removedItems)) {
            foreach ($removedItems as $rI) {
                ProgressSheetItem::find($rI->id)->delete();
            }
        }

        if (!empty($request->items)) {
            foreach ($request->items as $psItem) {
                $psi = ProgressSheetItem::find($psItem['id']);
                if ($psi !== null) {
                    $psi->unit = $psItem['unit'];
                    $psi->rents = $psItem['rents'];
                    $psi->repairs = $psItem['repairs'];
                    $psi->tl = isset($psItem['tl']) && $psItem['tl'] ? true : false;
                    $psi->subc = isset($psItem['subc']) && $psItem['subc'] ? true : false;
                    $psi->cost = $psItem['cost'];
                    $psi->inspection = $psItem['inspection'];
                    $psi->new_occupant = $psItem['new_occupant'];
                    $psi->eviction = $psItem['eviction'];
                    $psi->save();
                } else {
                    $nPsi = new ProgressSheetItem();
                    $nPsi->unit = $psItem['unit'];
                    $nPsi->rents = $psItem['rents'];
                    $nPsi->repairs = $psItem['repairs'];
                    $nPsi->cost = $psItem['cost'];
                    $nPsi->progress_sheet_id = $progressSheet->id;
                    $nPsi->inspection = $psItem['inspection'];
                    $nPsi->new_occupant = $psItem['new_occupant'];
                    $nPsi->eviction = $psItem['eviction'];
                    $nPsi->tl = isset($psItem['tl']) && $psItem['tl'] ? true : false;
                    $nPsi->subc = isset($psItem['subc']) && $psItem['subc'] ? true : false;
                    $nPsi->save();
                }
            }
        }
        session()->flash('alertSuccess', 'Progress sheet was successfully updated.');
        return redirect()->route('progress-sheets.edit', $progressSheet->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgressSheet $progressSheet)
    {
        $progressSheet->delete();
        session()->flash('alertSuccess', 'Progress Sheet deleted!');
        return redirect()->route('progress-sheets.index');
    }

    public function duplicate(Request $request)
    {
        $this->hasValidParam($request);
        $dbPs = ProgressSheet::find($request->refSheetId);
        $dbPs->date = $request->date;
        $progressSheet = $dbPs;
        $sheet = $progressSheet->getAttributes();
        $items = [];

        foreach ($progressSheet->items as $i) {
            array_push($items, [
                'unit' => $i->unit,
                'rents' => [
                    'rec' => '',
                    'delq' => '',
                ],
                'repairs' => '',
                'tl' => '',
                'subC' => '',
                'cost' => '',
                'inspection' => [
                    'lcks' => '',
                    'leks' => '',
                    'seal' => '',
                    'sd' => '',
                    'extern' => '',
                ],
                'new_occupant' => isset($i->new_occupant) ? $i->new_occupant->format('Y-m-d') : '',
                'eviction' => isset($i->eviction) ? $i->eviction->format('Y-m-d') : ''
            ]);
        }
        $data = [
            'nProgSheet' => array_merge($request->all(), $sheet),
            'sheet' => $sheet,
            'items' => $items,
            'user' => $progressSheet->user,
            'formType' => 'duplicate'
        ];
        return view('panel.pages.admin.progress-sheet.duplicate')->with($data);
    }

    public function duplicateStore(Request $request)
    {
        return $this->store($request);
    }

    /**
     * Rules for progress sheet inputs.
     */
    private function sheetRules(Request $request)
    {
        $validated = $request->validate([
            'propertyAddress'   => 'required|max:100',
            'date'              => ['required', new MonthYear],
            'pin'               => 'required|exists:users,pin',
            'lsAmountPerWeek'   => 'required|numeric',
            'sCamountPerWeek'   => 'required|numeric',
            'lsPerWeek'         => 'sometimes',
            'scPerWeek'         => 'sometimes',
            'comment'           => 'sometimes|max:3000',
            'status'            =>  ['required', Rule::in(['PENDING', 'ONGOING', 'COMPLETED'])],
        ]);

        $mYFragments = explode('/', $validated['date']);
        $parsedDate =  Carbon::parse(implode('/', [$mYFragments[1], $mYFragments[0], '1']));
        $request->merge([
            'parsedDate' => $parsedDate->format('Y-m-d H:i:s'),
            'lsPerWeek' => (object) ($validated['lsPerWeek'] ?? []),
            'scPerWeek' => (object) ($validated['scPerWeek'] ?? [])
        ]);
        return $request;
    }

    private function sheetItemRules(Request $request)
    {
        $request->merge([
            'subc' => (isset($request->subC) && ($request->subC === 'on' || $request->subC)),
            'tl' => (isset($request->subC) && ($request->subC === 'on' || $request->subC))
        ]);

        $request->validate([
            'items.*.id' => 'sometimes|nullable|exists:App\Models\ProgressSheetItem,id',
            'items.*.unit' => 'sometimes|nullable|numeric',
            'items.*.rents.rec' => 'sometimes|nullable|numeric',
            'items.*.rents.delq' => 'sometimes|nullable|numeric',
            'items.*.repairs' => 'sometimes|nullable|string|max:120',
            'items.*.repairs' => 'sometimes|nullable|string|max:120',
            'items.*.tl' => 'sometimes|nullable',
            'items.*.subc' => 'sometimes|nullable',
            'items.*.new_occupant' => 'sometimes|nullable|date',
            'items.*.eviction' => 'sometimes|nullable|date',
            'items.*.inspection.lcks' => 'sometimes|nullable|numeric',
            'items.*.inspection.leks' => 'sometimes|nullable|numeric',
            'items.*.inspection.seal' => 'sometimes|nullable|numeric',
            'items.*.inspection.sd' => 'sometimes|nullable|numeric',
            'items.*.inspection.extern' => 'sometimes|nullable|numeric',
        ]);

        return $request;
    }

    private function defaultProgSheetItems()
    {
        return [
            [
                'unit' => '',
                'rents' => [
                    'rec' => '',
                    'delq' => '',
                ],
                'repairs' => '',
                'tl' => '',
                'subC' => '',
                'cost' => '',
                'inspection' => [
                    'lcks' => '',
                    'leks' => '',
                    'seal' => '',
                    'sd' => '',
                    'extern' => '',
                ],
                'new_occupant' => '',
                'eviction' => ''
            ]
        ];
    }

    private function hasValidParam(Request $request)
    {
        $requiredParam = !isset($request->date) && !isset($request->landScaping) && !isset($request->siteCheck);
        if ($requiredParam) {
            return abort(404);
        }

        if ($request->route()->getName() == 'progress-sheet.duplicate') {
            if (!isset($request->refSheetId)) {
                return abort(404);
            }
        }
    }
}
