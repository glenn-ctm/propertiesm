<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use App\Models\RepairRequest;
use Illuminate\Http\Request;
use App\Enums\{RepairRequestStatus, PropertyInspection, PropertyMaintenance, PropertyManagementNeed};
use BenSampo\Enum\Rules\EnumValue;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class RepairRequestController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(RepairRequest::class, 'repair_request');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = RepairRequest::with('user')->orderBy('id', 'desc');

        if( ! (auth()->user()->is_admin() || auth()->user()->is_super_admin()) ){
            $query->where('user_id', auth()->user()->id);
        }

        if((auth()->user()->is_admin() || auth()->user()->is_super_admin()) && $search = $request->input('search')){
            $query->search($search);
        }

        return view('panel.pages.repair-request.index', ['repair_requests' => $query->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->is_property_owner()) {
            $data = [
                'maintenanceSelect' => [...PropertyMaintenance::getValues()],
                'inspectionsSelect' => [...PropertyInspection::getValues()],
                'mgtNeedsSelect'    => [...PropertyManagementNeed::getValues()],
            ];
            return view('panel.pages.repair-request.create-po', $data);
        }

        if (auth()->user()->is_tenant()) {
            return view('panel.pages.repair-request.create-tn');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'address' => 'required'
        ];

        if( auth()->user()->is_property_owner() ) {
            $rules = array_merge(
                $rules,
                [
                    'maintenance' => 'required',
                    'landscaping' => 'required',
                    'management_needs' => 'required',
                    'inspections' => 'required',
                    'frequency_of_inspection' => 'required',
                    'number_of_units' => 'required',
                ]
            );
        }

        // dd($rules);

        $request->validate($rules);

        RepairRequest::create([
            'user_id' => auth()->user()->id,
            'maintenance' => $request->input('maintenance') ? $this->arrayTransform($request->input('maintenance'), PropertyMaintenance::getValues()) : [],
            'landscaping' => $request->input('landscaping') ?? 'NA',
            'management_needs' => $request->input('management_needs') ? $this->arrayTransform($request->input('management_needs'), PropertyManagementNeed::getValues()) : [],
            'inspections' => $request->input('inspections') ? $this->arrayTransform($request->input('inspections'), PropertyInspection::getValues()) : [],
            'frequency_of_inspection' => $request->input('frequency_of_inspection') ?? 'NA',
            'number_of_units' => $request->input('number_of_units') ?? 0,
            'address' => $request->input('address'),
            'contact_number' => $request->input('contact_number') ?? auth()->user()->contact_number,
            'opt_out' => $request->input('opt_out') ?? false,
            'status' => RepairRequestStatus::PENDING,
            'remarks' => $request->input('remarks') ?? '',
        ]);

        session()->flash('alertSuccess', 'Repair request successfully created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RepairRequest $repairRequest)
    {
        if( $request->has('pdf-download') ) {

            if ( !auth()->user()->can('download repair_requests') ) abort(403);

            $logo64 = base64_encode(file_get_contents( public_path('/static/logo-small.png') ));
            $logoSource = 'data:image/jpeg;base64,'.$logo64;
            $pdf = PDF::loadView('panel.pages.repair-request.pdf', compact('repairRequest', 'logoSource'));
            // return $pdf->stream();
            return $pdf->download(time()."-request-{$repairRequest->id}.pdf");
        }

        return view('panel.pages.repair-request.show', compact('repairRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RepairRequest $repairRequest)
    {
        $status = RepairRequestStatus::getValues();
        return view('panel.pages.repair-request.edit', compact('repairRequest', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RepairRequest $repairRequest)
    {
        $request->validate([
            'status' => ['required', new EnumValue(RepairRequestStatus::class)],
            'comment' => 'required',
        ]);

        $repairRequest->update([
            'status' => $request->input('status')
        ]);

        $repairRequest->createComment($request->input('comment'));

        session()->flash('alertSuccess', 'Comment successfully created.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepairRequest $repairRequest)
    {
        $repairRequest->delete();

        session()->flash('alertSuccess', 'Repair request successfully deleted.');

        return redirect()->back();
    }

    public function arrayTransform($value, array $values) {
        if($value){
            $selected = explode(',' , $value);
            return array_filter($selected, function($val) use($values){
                return in_array($val, $values);
            });
        }
        return [];
    }
}
