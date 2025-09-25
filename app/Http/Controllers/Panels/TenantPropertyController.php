<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;

class TenantPropertyController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $query = Property::has('tenants')->withCount('tenants');

        if ($search = $request->input('search')) {
            $query->search($search);
        }

        return view('panel.pages.tenant-property.index', [
            'properties' => $query->paginate(15),
            'page_title' => 'Choose property to see tenants'
        ]);
    }

    public function show(Request $request, Property $property)
    {
        $this->authorize('view', $property);

        $query = $property->tenants()->withCount(['payments', 'repair_requests']);
        $btn_delete_message = 'Are you sure you want to delete Tenant? This will permanently remove all this user\'s records including requests and payments';

        if($search = $request->input('search')){
            $key_like = '%'.$search.'%';
            $query->where(function ($q) use($key_like) {
                $q->where('name', 'like', $key_like)
                  ->orWhere('pin', 'like', $key_like);
            });
        }

        return view('panel.pages.tenant-property.show', [
            'property' => $property,
            'users' => $query->paginate(10),
            'btn_delete_message' => $btn_delete_message,
        ]);
    }
}
