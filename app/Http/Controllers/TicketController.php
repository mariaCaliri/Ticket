<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $tickets = Ticket::latest()->get();
       return redirect()->route('admin.Home', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return redirect()->route('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request )
    {

        $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'status'=> 'required',
            'category_id'=> 'required',
        ]);

             Ticket::create($request->all());

                 return redirect()->route('tickets.show')->with('Ticket creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Http\Response
    {
        $ticket = Ticket::findOrFail($id);
        return response()->view('show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, TICKET $ticket): \Illuminate\Http\RedirectResponse
    {

        $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'status'=> 'required',
            'category_id'=> 'required',

        ]);
        $ticket->update($request->all());

      return redirect()->route('admin.home')->with('Ticket Modificato correttamente');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('admin.home')->with('Il ticket è stato cancellato');
    }
}
