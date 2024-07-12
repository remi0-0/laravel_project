<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(ContactRequest $request)
    {
        $validated = $request->validated();

        if($validated){
            Contact::create([
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'phone' => $request->phone,
            'email' => $request->email,
            'body' => $request->body
        ]);
        }

        //メール送信処理
         Mail::to('remi.mitsuda@onoff.ne.jp')->send(new ContactAdminMail($validated));
        return view('contact.complete');
    }
}
