<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Payment::class, 'payment');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Payment::with('user')->orderBy('id', 'desc');

        if( ! (auth()->user()->is_admin() || auth()->user()->is_super_admin()) ) {
            $query->where('user_id', auth()->user()->id);
        }

        if((auth()->user()->is_admin() || auth()->user()->is_super_admin()) && $key = $request->input('search')){
            $key_like = '%'.$key.'%';
            $query->whereHas('user', function($q) use($key_like){
                return $q->where('name', 'like', $key_like)
                    ->orWhere('pin', 'like', $key_like);
            });
        }

        $payments = $query->paginate(10);
        return view('panel.pages.payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.pages.payment.create');
    }
}
