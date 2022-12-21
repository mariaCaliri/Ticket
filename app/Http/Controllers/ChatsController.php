<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use http\Message;
use Illuminate\Http\Request;
use App\Models\Chat;
use Symfony\Component\Console\Input\Input;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('chat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Ticket $ticket)
    {
        return view('chat.create')->with('ticket', $ticket);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Ticket $ticket)
    {
        $id = $request->input('ticket_id');

        $request->validate([
            'body'=>'required|string|min:5|max:2000' ,
        ]);

        $message = new Chat([
            'body'=>$request->get('body'),
            'user_id'=>2,
            'ticket_id'=>2
        ]);



        $message->save();

        return view('chat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);

        return response()->view('chat.show', compact('ticket'));
    }

}
