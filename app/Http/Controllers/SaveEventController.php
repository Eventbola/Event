<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SaveEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaveEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $arrayevent=array();
        //run item
        foreach ($save_events as $save_event)
        {
//            $save_event->event_id;
            array_push($arrayevent,$save_event->event_id);
        }
        $events=Event::WhereIn('id',$arrayevent)->get();
        if (count($save_events) > 0){
            return view('event.savedEvent', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('event.savedEvent', compact('save_events', 'events'));
        }

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaveEvent  $saveEvent
     * @return \Illuminate\Http\Response
     */
    public function show(SaveEvent $saveEvent)
    {
        //
    }
    public  function saveEvent(Request $request,$id){
       // id is event-id
        $save = new SaveEvent();
        $save->user_id = auth()->id();
        $save->event_id = $id;
        $save->save();
        return redirect()->route('home');
    }
    public function unsaveEvent($event_id)
    {
        $unsaveEvent=SaveEvent::where('event_id',$event_id)->delete();
        return redirect()->route('home');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaveEvent  $saveEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(SaveEvent $saveEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaveEvent  $saveEvent
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, SaveEvent $saveEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaveEvent  $saveEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaveEvent $saveEvent,$event_id)
    {

    }

}
