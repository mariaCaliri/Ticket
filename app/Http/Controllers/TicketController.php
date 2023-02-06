<?php

namespace App\Http\Controllers;


use App\Mail\closedTicket;
use App\Mail\OperatorRegistred;
use App\Mail\TicketRegistred;
use App\Mail\TicketSuccesCreated;
use App\Models\Chat;
use App\Models\Operator;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\OperatorsNotification;
use App\Notifications\TicketCreated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $tickets = Ticket::all();
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
          'user_id'=> Auth::id(),
          'end_date'=> null

      ]);

      $ticket->save();
     Mail::to('maria.caliri@tecnasoft.it')->send(new TicketRegistred());
     Mail::to($request->user())->send( new TicketSuccesCreated());

        $operators = Operator::all();
        foreach ($operators as $operator){
            Notification::send($operator, new OperatorsNotification());
        }

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
    public function update(Request $request, Ticket $ticket)
    {

      $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'status'=> 'required',
            'category_id'=> 'required',
            'feedback' => 'min:5|max:200',
            'operator_id'=>''
        ]);
             $ticket->update($request->all());
             $ticket->save();
      //  Mail::to($request->user())->send(new closedTicket());

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

    public function feedback(Request $request, Ticket $ticket ): RedirectResponse
    {
        $request->validate([
           'feedback'=>'min:5|max:200'
        ]);
        $ticket = $request->get('ticket_id');


       DB::table('tickets')->where('id', $ticket)->update([
           'feedback'=> $request->get('feedback')
       ]);


        return to_route('home', with('ticket'));
    }

    public function showFeedback()
    {
       $tickets =  Ticket::all();
        return view('feedback', compact('tickets'));
    }

    public function operatorEdit( Request $request, int $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
       $ticket->save();

    }

    public function showReports()
    {
        return view('reports');
    }
}
