<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\PropertyAmenities;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Property::query()->orderBy('id', 'desc');
        $template = 'panel.pages.property.index';

        if (auth()->user()->is_property_owner()) {
            $query->where('owner_id', auth()->user()->id);
            $template = 'panel.pages.property.po-index';
        }

        if ((auth()->user()->is_admin() || auth()->user()->is_super_admin()) && $search = $request->input('search')) {
            $query->search($search);
        }

        return view($template, [
            'properties' => $query->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.pages.property.form', [
            'available_amenities' => PropertyAmenities::getValues(),
            'property_owners' => User::propertyOwners()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $property = Property::create([
            'owner_id' => $request->input('user_id'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'description' => $request->input('description'),
            'amenities' => $request->input('amenities'),
            'regulation' => $request->input('regulation'),
            'number_of_units' => $request->input('number_of_units'),
            'rooms' => $request->input('rooms'),
            'bathrooms' => $request->input('bathrooms'),
            'square_footage' => $request->input('square_footage'),
            'pets' => $request->input('pets'),
            'owner_pays' => $request->input('owner_pays'),
            'rent' => $request->input('rent'),
            'security' => $request->input('security'),
            'security_relief_available' => $request->input('security_relief_available'),
            'comment' => $request->input('comment')
        ]);

        if ($media_ids = $request->input('media')) {
            $property->updateMediaUploads($media_ids);
        }

        session()->flash('alertSuccess', 'Property successfully created.');

        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('panel.pages.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('panel.pages.property.form', [
            'property' => $property,
            'available_amenities' => PropertyAmenities::getValues(),
            'property_owners' => User::propertyOwners()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $this->validateRequest($request);

        $property->update([
            'owner_id' => $request->input('user_id'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'description' => $request->input('description'),
            'amenities' => $request->input('amenities'),
            'regulation' => $request->input('regulation'),
            'number_of_units' => $request->input('number_of_units'),
            'rooms' => $request->input('rooms'),
            'bathrooms' => $request->input('bathrooms'),
            'square_footage' => $request->input('square_footage'),
            'pets' => $request->input('pets'),
            'owner_pays' => $request->input('owner_pays'),
            'rent' => $request->input('rent'),
            'security' => $request->input('security'),
            'security_relief_available' => $request->input('security_relief_available'),
            'comment' => $request->input('comment')
        ]);

        if ($media_ids = $request->input('media')) {
            $property->updateMediaUploads($media_ids);
        }

        session()->flash('alertSuccess', 'Property successfully updated.');

        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();

        session()->flash('alertSuccess', 'Property successfully deleted.');

        return redirect()->route('properties.index');
    }

    protected function validateRequest($request)
    {
        $request->validate([
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'city' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'description' => 'required',
            'amenities' => [
                'array',
                'required',
                'min:1',
            ],
            'regulation' => [
                'array',
                'required',
                'min:1',
            ],
            'number_of_units' => 'required',
            'rooms' => 'required',
            'bathrooms' => 'required',
            'square_footage' => 'required',
            'pets' => 'required',
            'owner_pays' => 'required',
            'rent' => 'required',
            'security' => 'required',
            'comment' => 'required',
        ], [
            'user_id.exists' => 'The user id field is invalid.',
            'user_id.required' => 'The user field is required.',
        ]);
    }
}
