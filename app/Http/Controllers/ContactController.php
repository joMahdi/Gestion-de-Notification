<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Mail;


class ContactController extends Controller
{
    public function create(){

    	return view('contact');

    }

    public function store(Request $request){
    	$this->validate($request , [
    		'name' => 'required',
    		'email' => 'required|email',
    		'message' => 'required'
    	]);

    	//First method

    	/*Mail::send('emails.contact-message', [
    		'msg' => $request->message ],
    		function ($mail) use ($request) {
    			$mail->from($request->email , $request->name);
    			$mail->to('mahdi@example.com')->subject('Contact Message');
    		}
    	);
    	return redirect()->back()->with('flash_message', 'Thank you for your message');*/

    	//second Method

    	$data = $request->all();
    	Mail::send(['html' => 'emails.contact-message'], $data, function ($m) use ($data) {
            $m->from($data['email'], $data['name']);
            $m->cc($data['email'], $data['name']);
            $m->to(config('mail.from.address'), config('mail.from.name'))->subject('Contact');
        });

    	return redirect()->back()->with('flash_message', 'Thank you for your message');
    	

    }

    

    public function sendMail(Request $request)
    {

        //php artisan make:mail ContactEmail --markdown=emails.contactEmail
        $content = [
            'name'=> $request->name, 
            'email'=> $request->email,
            'msg' => $request->message,
            ];

        Mail::to(config('mail.from.address'))->send(new ContactEmail($content));


        return redirect()->back()->with('flash_message', 'Thank you for your message');
    }
}
