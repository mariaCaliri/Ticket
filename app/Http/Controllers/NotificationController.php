<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send()
    {
        $user = User::all();
//        $details = array();
//        $details['greeting'] = $request->greeting;
//        $details['body'] = $request->body;
//        $details['actiontext'] = $request->actiontext;
//        $details['actionurl'] = $request->actionurl;
//        $details['endtext'] = $request->endtext;
//
//        foreach($users as $user) {
//            Notification::send($user, new SendEmailNotification($details));
//        }

    }
}
