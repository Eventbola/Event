<?php

namespace App\Http\Controllers;

use App\Helpers\Auth\Auth;
use App\Models\Request as Register;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Illuminate\Support\Facades\Auth::check() == false) {
            return redirect('login');
        }
        $event = new Register();
        $event->user_requester_id = auth()->id();
        $event->user_requested_id = $request->user_id;
        $event->event_id = $request->id;
        $event->token = $request->_token;

        $event->save();
//            return redirect(route('page')) ;
        return redirect('event/page/' . $event->event_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $delete = \App\Models\Request::whereRaw('event_id = ? and user_requester_id =?', [$id, \auth()->id()])->get();
        $delete = $delete->getIterator()[0];
        $delete->delete();
        return redirect('event/page/' . $delete->event_id);

    }
}
