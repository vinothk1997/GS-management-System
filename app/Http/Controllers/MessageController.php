<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){

    }
    public function create(Request $req){
        $fromId=$req->from_id;
        return view('message.create',compact('fromId'));

    }
    public function store(Request $req){
        $lastMessageId=Message::pluck('message_id')->last();
        if(!$lastMessageId){
            $messageId="MSG0000001";
        }
        else{
            $messageId=++$lastMessageId;
        }
        $message =new Message;
        $message->message_id=$messageId;
        $message->from_id=$req->from_id;
        $message->to_id=$req->to_id;
        $message->subject=$req->subject;
        $message->message_id=$req->message_id;
        $message->date=$req->date;
        $message->time=$req->time;
        $message->inbox_deleted=$req->inbox_deleted;
        $message->sent_deleted=$req->sent_deleted;
        $message->read_status=$req->read_status;
        $message->save();

    }
    public function edit(Request $req)
    {
        $message=Message::find($req->message_id);
        return view('message.edit',compact('message'));

    }
    public function update(Request $req)
    {
        $message=Message::find($req->message_id);
        $message->message = $req->message;
        $message->save();
        return redirect();
    }

    public function show(){

    }
    
    public function delete(){

    }
    
}