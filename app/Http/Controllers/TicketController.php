<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function index()
    {
        $tickets = auth()->user()->tickets()->orderBy('created_at', 'desc')->get();
       return redirect()->route('admin.home', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request , Ticket $ticket )
    {

      $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'category_id'=> 'required',
            'message'=>'required'
        ]);

      $ticket = new Ticket([
          'title' =>$request->get('title'),
          'priority'=>$request->get('priority'),
          'category_id'=> $request->get('category_id'),
          'message'=> $request->get('message'),
          'user_id'=> 1,
          'end_date'=> null

      ]);
      $ticket->save();
       return redirect()->route('home')->with('Ticket creato correttamente');

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
        return response()->view('ticket.show', compact(['ticket']));
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


        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, Ticket $ticket): RedirectResponse
    {

      $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'status'=> 'required',
            'category_id'=> 'required',


        ]);

             $ticket->update($request->all());
             $ticket->save();


      return redirect()->route('admin.home')->with('Ticket Modificato correttamente');
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('admin.home')->with('Il ticket è stato cancellato');
    }
}
