<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Reminder;

class ReminderController extends Controller
{
    public function index(){
    	$reminders = Reminder::where('status', 'serving')->orderBy('enddate')->get();
    	$reminderList = [];
        $extraReminderList = [];
    	foreach ($reminders as $reminderItem) {
            //有looplevel的提醒算出近三个月中的循环
            
            if($reminderItem->looplevel == '每天'){
                //每天暂不循环
            }elseif($reminderItem->looplevel == '每周'){
                //每周
                $tmpReminder = clone $reminderItem;
                $tmpReminder->enddate = date('Y-m-d H:i:s', strtotime($tmpReminder->enddate. ' + 7days'));
            }elseif($reminderItem->looplevel == '每月'){
                $tmpReminder = clone $reminderItem;
                $tmpReminder->enddate = date('Y-m-d H:i:s', strtotime($tmpReminder->enddate.' + 1month'));
            }   
            if(isset($tmpReminder)){
                $extraReminderList[] = $tmpReminder;
            }
    		$tmpDateFormated = date('Y-m-d', strtotime($reminderItem->enddate));
            //小于当前时间的提醒就剔除掉
            if(strtotime($reminderItem->enddate) >= time()){
                $reminderList[$tmpDateFormated][] = $reminderItem;
            }
    	}
        if(!empty($extraReminderList)){
            foreach ($extraReminderList as $reminderItem) {
                $tmpDateFormated = date('Y-m-d', strtotime($reminderItem->enddate));
                $reminderList[$tmpDateFormated][] = $reminderItem;
            }
        }
    	$data['reminderList'] = $reminderList;
    	return view('reminder.index', $data);
    }
    public function add(){
    	return view('reminder.add');
    }
    public function insert(Request $request){
    	$this->validate($request, [
    		'content' => 'required| max:120',
    		'enddate' => 'required| date',
    		'looplevel' => 'required| numeric',
    		'personemail' => 'required| email',
    	]);	
    	$reminder = new Reminder;
    	$reminder->content = $request->input('content');
    	$reminder->enddate = $request->input('enddate');
    	$reminder->looplevel = $request->input('looplevel');
    	$reminder->personsend = $request->input('personsend');
    	$reminder->personemail = $request->input('personemail');
    	if($reminder->save()){
    		return redirect()->route('reminder')->with('status', '添加成功!');
    	}
    }
    public function edit($id){
    	$data['reminder'] = Reminder::find($id);
    	return view('reminder.edit', $data);
    }

    public function update(Request $request){
    	$this->validate($request, [
    		'content' => 'required| max:120',
    		'enddate' => 'required| date',
    		'looplevel' => 'required| numeric',
    		'personemail' => 'required| email',
    	]);	
    	$reminder = Reminder::find($request->input('id'));
    	$reminder->content = $request->input('content');
    	$reminder->enddate = $request->input('enddate');
    	$reminder->looplevel = $request->input('looplevel');
    	$reminder->personsend = $request->input('personsend');
    	$reminder->personemail = $request->input('personemail');
    	if($reminder->save()){
    		return redirect()->route('reminder')->with('status', '更新成功!');
    	}
    }

    public function delete($id){
    	$reminder = Reminder::find($id);
    	$reminder->status = 'deleted';
    	if($reminder->save()){
    		return redirect()->route('reminder')->with('status', '删除成功!');
    	}
    }
}
