<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\FamilyHead;
use App\Models\Message;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;

class MessageController extends Controller
{
    public function index(){
        $user=session()->get('user');
        $messages=Message::where('to_id',$user['user_id'])->orderby('message_id','desc')->get();
        $familyHeads=FamilyHead::select('family_id','first_name')->get();
        $staffs=Staff::select('staff_id','first_name')->get();
        if($user['user_type']=='family head'){
            return view('message.index',compact('user','staffs','messages'));
        }
        else{
            return view('message.index',compact('user','staffs','familyHeads','messages'));
        }
    }

    public function store(Request $req){
        $now = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
        $lastMessageId=Message::pluck('message_id')->last();
        if(!$lastMessageId){
            $messageId="MSG0000001";
        }
        else{
            $messageId=++$lastMessageId;
        }
        $message =new Message;
        $message->message_id=$messageId;
        $message->from_id=$req->from;
        $message->to_id=$req->to;
        $message->subject=$req->subject;
        $message->message=$req->body;
        $message->time=$now->format('H:i:s');
        $message->date=$now->format('y-m-d');
        $message->inbox_deleted=true;
        $message->sent_deleted=true;
        $message->read_status=true;
        $message->save();
        return redirect()->route('message.index');

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
    
    public function delete($id){
        $message=Message::where('message_id',$id)->delete();
        return redirect()->route('message.index');
    }

    public function read($id){
        $message=Message::where('message_id',$id)
        ->update(['read_status'=>false]);
        return redirect()->route('message.index');
    }

    public function sentMessages(){
        $user=session()->get('user');
        $messages=Message::where('from_id',$user['user_id'])->orderby('message_id','desc')->get();
        $familyHeads=FamilyHead::select('family_id','first_name')->get();
        $staffs=Staff::select('staff_id','first_name')->get();
        if($user['user_type']=='family head'){
            return view('message.sent',compact('user','staffs','messages'));
        }
        else{
            return view('message.sent',compact('user','staffs','familyHeads','messages'));
        }

    }

    public function sentDeleted($id){
        $message=Message::where('message_id',$id)
        ->update(['sent_deleted'=>false]);
        return redirect()->route('message.sentMessages');
    }
    
}