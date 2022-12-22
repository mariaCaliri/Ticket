<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('chat.index');
    }

    public function create($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('chat.create')->with('id', $id);
    }

    public function store(Request $request, Ticket $ticket)
    {

        $request->validate([
            'body'=>'required|string|min:5|max:2000' ,
        ]);
        $ticket_id = $request->get('ticket_id');
        $message = new Chat([
            'body'=>$request->get('body'),
            'user_id'=>Auth::id(),
            'ticket_id'=> $ticket_id
        ]);

        $message->save();

        return to_route('tickets.show', $ticket_id);
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        $messages = Chat::all();


        return response()->view('chat.show', compact('ticket'));
    }



}
