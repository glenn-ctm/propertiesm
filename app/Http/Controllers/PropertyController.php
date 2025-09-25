<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( !auth()->check() ){
            return redirect(route('login') . '?redirect=' . route('site-properties.index'));
        }

        $query = Property::with([
            'media' =>  function($query){
                $query->groupBy('model_id')->orderBy('id', 'desc');
            }
        ])->orderBy('id', 'desc');

        if( $search = $request->input('search') ){
            $query->search($search);
        }

        return view('site.pages.property.index', [
            'properties' => $query->paginate(10)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        if( !auth()->check() ){
            return redirect(route('login') . '?redirect=' . route('site-properties.show', $property->id));
        }

        return view('site.pages.property.show', compact('property'));
    }

}
