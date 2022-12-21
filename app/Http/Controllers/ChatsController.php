<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('chat.index');
    }

    public function create()
    {

        return view('chat.create');
    }

    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'body'=>'required|string|min:5|max:2000' ,
        ]);
        $ticket_id= $ticket->id;
        $message = new Chat([
            'body'=>$request->get('body'),
            'user_id'=>2,
            'ticket_id'=> $ticket_id
        ]);

        $message->save();

        return view('chat.index');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return response()->view('chat.show', compact('ticket'));
    }



}
