<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUsMail;
use Mail;
use Validator;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Contact Us'
        ];

        return view('site.pages.contact-us')->with($data);
    }

    public function send(Request $request) {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {

            session()->flash('alertError', 'Some fields are required');

            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }

        // $recepient = env("mail_recepient");
        $recepient = 'smtp.propertiesm@gmail.com';

        $data = [
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        //Mail::to($recepient)->bcc('info@toollawn.com')->send(new ContactUsMail($data));
        Mail::to('info@toollawn.com')->send(new ContactUsMail($data));

        session()->flash('alertSuccess', 'Sent!');

        return redirect()->back();
    }
}
