<?php

namespace App\Http\Controllers;


use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function create()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'sender'=> 'required',
            'message'=> 'required',
        ]);
        Message::create([
            'sender_name'=>$request->input('sender'),
            'message_content'=>$request->input('message'),
        ]);
        return redirect('/contact/create')->with('success','Message sent, Thank you!');
    }
}
