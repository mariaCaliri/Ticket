<?php

namespace App\Http\Controllers;

use App\Mail\OperatorRegistred;
use App\Models\Operator;
use App\Notifications\TicketCreated;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $operators = Operator::all();
        return view('operator.index', compact('operators'));
    }

    public function send($id)
    {
        $data = Operator::find($id);
        return view('operator.send_email_view', compact('data'));
    }

    public function storeSingleEmail(Request $request, $id)
    {
        $operator = Operator::find($id);
        $details = array();

        $details['greeting'] = $request->get('greeting');
        $details['body'] = $request->get('body');
        $details['action-text'] = $request->get('action-text');
        $details['action-url'] = $request->get('action-url');
        $details['end-text'] = $request->get('end-text');

        Notification::send($operator, new TicketCreated($details));

        return redirect()->route('admin.operatore.index');

    }

    public function emailViewAll(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('operator.send_email_all_view');
    }

    public function storeAllEmail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $operators = Operator::all();

        $details = array();

        $details['greeting'] = $request->get('greeting');
        $details['body'] = $request->get('body');
        $details['action-text'] = $request->get('action-text');
        $details['action-url'] = $request->get('action-url');
        $details['end-text'] = $request->get('end-text');

        foreach ($operators as $operator){
            Notification::send($operator, new TicketCreated($details));
        }
        return redirect()->route('admin.operatore.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('operator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required|min:5|',
           'email'=>'required',
           'password'=>'required'
        ]);
        $operator = new Operator([
           'name'=>$request->get('name'),
           'email'=>$request->get('email'),
           'password'=>$request->get('password')
        ]);
        $operator->save();
        Mail::to($operator)->send(new OperatorRegistred($operator));
        return redirect()->route('admin.operatore.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operator = Operator::findOrFail($id);
        return response()->view('operator.show', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $operator = Operator::findOrfail($id);
        return view('operator.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>'required'
        ]);

        $operator = Operator::findOrfail($id);
        $operator->update($request->all());

        $operator->save();

        return redirect()->route('admin.operatore.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $operator = Operator::findorfail($id);
        $operator->delete();

        return redirect()->route('admin.operatore.index');
    }
}
