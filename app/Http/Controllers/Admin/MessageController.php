<?php

namespace App\Http\Controllers\Admin;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //
    public function getIndex()
    {
        $messages = Message::orderBy('id' , 'DESC')->get();

        return view('admin.pages.messages.index' ,compact('messages'));
    }

    public function getDelete($id)
    {
        $message = Message::find($id);

        $message->delete();

        return redirect()->back();
    }
}
