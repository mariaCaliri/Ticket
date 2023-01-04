<?php

namespace App\Http\Controllers;

use App\Mail\OperatorRegistred;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Operator $operator)
    {
        $request->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>'required'
        ]);

        dd($operator);

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
