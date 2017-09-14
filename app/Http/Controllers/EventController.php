<?php

namespace App\Http\Controllers;

use App\Models\Access\User\User;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Http\Request;
use app\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('frontend.Event.event');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() == false) {
            return redirect('login');
        }

        return view('frontend.Event.event');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            Image::make($image)->save(public_path('image/') . $filename);
        }
        $event->image = $filename;
        $event->title = $request->event_name;
        $event->location = $request->location;
        $event->time_start = $request->time_start;
        $event->time_end = $request->time_end;
        $event->keyword = $request->keyword;
        $event->description = $request->description;
        $event->ticket = $request->ticket_url;


        $event->user_id = auth()->id();

        $event->save();
        return redirect('event/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check() == false) {
            return redirect('login');
        }

        $id = auth()->id();
        $events = Event::get()->all();
        $events = Event::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        return view('frontend.Event.manage', compact('events'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::findOrFail($id); //
        return view('frontend/Event/edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            Image::make($image)->save(public_path('image/') . $filename);
        }
        $event->image = $filename;
        $event->title = $request->event_name;
        $event->location = $request->location;
//        $event->image = $request->image;
        $event->time_start = $request->time_start;
        $event->time_end = $request->time_end;
        $event->keyword = $request->keyword;
        $event->description = $request->description;
        $event->ticket = $request->event_name;
        $event->update();


        return redirect('event/manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Event::findOrFail($id);
        $delete->delete();
        return redirect('event/manage');
    }

    /**
     * page event
     */
    public function page($id)
    {
        $event = Event::findOrfail($id);
        return view('frontend.Event.page')->with('event', $event);
    }



    public function calendar()
    {
        $date = Carbon::today();
        $events = DB::table('events')
            ->whereYear('time_start',$date)
            ->get();
        return view('frontend.Event.calendar')->with('events',$events);
    }
    public function month(){
        $date = Carbon::today();
        $month =Carbon::createFromFormat('Y-m-d H:i:s', $date)->month;
        $events = DB::table('events')
            ->whereMonth('time_start',$month)
            ->get();
        return view('frontend.Event.calendar')->with('events',$events);
    }
    public function today(){
        $date = Carbon::today();
        $today =Carbon::createFromFormat('Y-m-d H:i:s', $date)->day;
        $events = DB::table('events')
            ->whereDay('time_start',$today)
            ->get();
        return view('frontend.Event.calendar')->with('events',$events);
    }
    public function tomorrow(){
        $date = Carbon::today();
        $tomorrow =Carbon::createFromFormat('Y-m-d H:i:s', $date)->addDay(1);
        $events = DB::table('events')
            ->whereDate('time_start',$tomorrow)
            ->get();
        return view('frontend.Event.calendar')->with('events',$events);
    }
//    public function week(){
//        $date = Carbon::today();
//        $event_array = array();
//        $day =Carbon::createFromFormat('Y-m-d H:i:s', $date)->day;
//
//        $events = DB::table('events')
//            ->whereDay('time_start','>=',[$day])
//            ->get();
//        foreach ($events as $event){
//            if (Carbon::createFromFormat('Y-m-d H:i:s', $event->time_start)->day <= $day+7){
//                 array_push($event_array,$event);
//            }
//        }
//        $events = $event_array;
////        dd($events);
//        return view('frontend.Event.calendar', compact('events'));
//    }
      public function week(){
          $date = Carbon::today();
          $week =Carbon::createFromFormat('Y-m-d H:i:s', $date)->addWeekday(7);
          $events = DB::table('events')
              ->whereRaw('time_start',$week)
              ->get();
          return view('frontend.Event.calendar')->with('events',$events);
      }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('frontend.Event.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Event::select("title as name")->where("title", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function ind(){
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function liveSearch()
    {
        if(\request('key') != ''){
            $events = Event::all();
        }
        $events = Event::where('title', 'like', '%'.request('key').'%')->get();

        return Response::json(['status' => true, 'data' => $events]);
    }

    public function home()
        {
            $event=Event::all();
            return view('event.index')->with('events',$event);
        }

    public function searchdata()
    {
        if (\request('key')!=''){
            $events=Event::all();
        }
        $events=Event::where('title','LIKE', '%'.request('key').'%')->get();
        return Response::json(['status' => true, 'data' => $events]);

    }


}
