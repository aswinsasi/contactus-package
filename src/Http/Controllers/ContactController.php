<?php

namespace Aswinachu\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Aswinachu\Contact\Mail\ContactMailable;
use Aswinachu\Contact\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

   public function send(Request $request)
   {
        Mail::to(config('contact.send_mail_to'))->send(new ContactMailable($request->name,$request->message));
        Contact::create($request->all());
        return redirect(route('contact'));
   }
}
