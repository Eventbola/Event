<?php

namespace App\Http\Controllers;

use App\KKKK;
use App\Mail\Invitation;
use App\Models\Access\User\User;
use App\Participate;
use App\SendMail;
use App\Models\SaveEvent;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use Illuminate\Http\Request;
use app\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use App\Models\Request as sent;
use App\Models\SendMail as email;
use App\Mail\EmailInvitation;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function home()
//    {
//
//        return view('event.index');
//    }

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
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $events = Event::where('user_id', \auth()->id())->get();
        $requests = \App\Models\Request::where('user_requested_id', auth()->id())->get();
        return view('frontend.Event.event', compact('requests', 'events','save_events'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $event = new Event();

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            Image::make($image)->save(public_path('image/') . $filename);
        }
        $event->image = $filename;
        $event->priority = true; // true is an admin of event
        $event->title = $request->event_name;
        $event->location = $request->location;
        $event->lat=$request->lat;
        $event->lng=$request->lng;
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
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $request_notifications = \App\Models\Request::where('confirmed', 0)->get();
        $events = Event::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        $requesteds = \App\Models\Request::whereRaw('user_requester_id =? and confirmed', [\auth()->id(), 1])->get();
        $array_members = array();
        foreach ($requesteds as $requested) {
            array_push($array_members, $requested->event_id);
        }
        $event_members = Event::whereIn('id', $array_members)->get();
//
        $requester_names = array();
        if (count($request_notifications) > 0) {

            foreach ($request_notifications as $item) {
                array_push($requester_names, $item->user_requester_id);
            }
            $user_requester_names = User::whereIn('id', $requester_names)->get();
            if (count($event_members) > 0) {
                return view('frontend.Event.manage', compact('events', 'save_events','users', 'requests', 'user_requester_names', 'confirmed', 'event_members'));
            } else {
                $event_members = null;
                return view('frontend.Event.manage', compact('events','save_events', 'users', 'requests', 'user_requester_names', 'confirmed', 'event_members'));
            }

        } else {

            $user_requester_names = null;
            $users = User::all();
            $requests = sent::get()->all();
            if (count($event_members) > 0) {
                return view('frontend.Event.manage', compact('events', 'users', 'requests','save_events', 'user_requester_names', 'confirmed', 'event_members'));
            } else {
                $event_members = null;
                return view('frontend.Event.manage', compact('events', 'users','save_events', 'requests', 'user_requester_names', 'confirmed', 'event_members'));
            }
        }
        dd(100);
        $users = User::all();

        $requests = sent::get()->all();

        $events = Event::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();


//        return view('frontend.Event.manage', compact('events', 'users', 'requests'));


        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        if (count($save_events) > 0){
            return view('frontend.Event.manage', compact('save_events', 'events','users', 'requests'));
        }else{
            $save_events = null;
            return view('frontend.Event.manage', compact('save_events', 'events','users', 'requests'));
        }


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
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        return view('frontend/Event/edit', compact('save_events'))->with('event', $event);
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
        $requests = \App\Models\Request::where('event_id', $id)->get();
        foreach ($requests as $request) {
            $request->delete();
        }

        $delete = Event::findOrFail($id);
        $delete->delete();


        return redirect('event/manage');
    }

    /**
     * page event
     */
    public function page($id)
    {
        $event = Event::findOrfail($id); // find event
        $eventadmin = Event::whereRaw('id = ? and user_id = ? and priority = ?', [$id, \auth()->id(), '1'])->get();
        $user_request = \App\Models\Request::whereRaw('event_id = ? and user_requester_id = ? ', [$id, \auth()->id()])->get();
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();

        if (count($eventadmin) > 0) {
            $eventadmin = $eventadmin->getIterator();

            if (count($user_request) > 0) {
                $user_request = $user_request->getIterator();

                return view('frontend/Event/page', compact('event','save_events', 'eventadmin', 'user_request'));
            } else {
                $user_request = null;
                return view('frontend/Event/page', compact('event', 'eventadmin','save_events', 'user_request'));
            }


        } else {
            $eventadmin = null;

            if (count($user_request) > 0) {
                $user_request = $user_request->getIterator();
//                dd($user_request);
                return view('frontend/Event/page', compact('event','save_events', 'eventadmin', 'user_request'));
            } else {
                $user_request = null;
                return view('frontend/Event/page', compact('event','save_events', 'eventadmin', 'user_request'));
            }

        }
    }


    public function calendar()
    {
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $date = Carbon::today();
        $events = DB::table('events')
            ->whereYear('time_start',$date)
            ->get();
        if (count($save_events) > 0){
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }
    }
    public function month(){
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $date = Carbon::today();
        $month =Carbon::createFromFormat('Y-m-d H:i:s', $date)->month;
        $events = DB::table('events')
            ->whereMonth('time_start',$month)
            ->get();
        if (count($save_events) > 0){
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }
    }
    public function today(){
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $date = Carbon::today();
        $today =Carbon::createFromFormat('Y-m-d H:i:s', $date)->day;
        $events = DB::table('events')
            ->whereDay('time_start',$today)
            ->get();
        if (count($save_events) > 0){
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }
    }
    public function tomorrow(){
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $date = Carbon::today();
        $tomorrow =Carbon::createFromFormat('Y-m-d H:i:s', $date)->addDay(1);
        $events = DB::table('events')
            ->whereDate('time_start',$tomorrow)
            ->get();
        if (count($save_events) > 0){
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }
    }
    public function week(){
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $date = Carbon::today();
        $event_array = array();
        $day =Carbon::createFromFormat('Y-m-d H:i:s', $date)->day;

        $events = DB::table('events')
            ->whereDay('time_start','>=',[$day])
            ->get();
        foreach ($events as $event){
            if (Carbon::createFromFormat('Y-m-d H:i:s', $event->time_start)->day <= $day+7){
                 array_push($event_array,$event);
            }
        }
        $events = $event_array;
//        dd($events);
        if (count($save_events) > 0){
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }else{
            $save_events = null;
            return view('frontend.Event.calendar', compact('save_events', 'events'));
        }
    }
//      public function week(){
//          $date= Carbon::today();
//          dd($date);
//          $week=
//          $events = DB::table('events')
//              ->whereBetween('time_start',$date)
//              ->get();
//          return view('frontend.Event.calendar')->with('events',$events);
//      }



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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ind()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg' => $msg), 200);
    }

    /**
     * @return mixed
     */
    public function liveSearch()
    {
        if (\request('key') != '') {
            $events = Event::all();
        }
        $events = Event::where('title', 'like', '%' . request('key') . '%')->get();
        if (count($events) > 0) {
            return Response::json(['status' => true, 'data' => $events]);
        } else {
            $events = null;
            return Response::json(['status' => true, 'data' => $events]);
        }


    }

    /**
     * @return $this
     */
    public function home()
    {
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $events = Event::all();
        if (count($save_events) > 0){
            return view('event.index', compact('save_events', 'events' ,'array_user_store_event'));
        }else{
            $save_events = null;
            return view('event.index', compact('save_events', 'events' ,'array_user_store_event'));
        }

    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function email(Request $request)
    {
        $email = $request->email;
        Mail::to($email)
            ->send(new Invitation($request->event));

        if (Mail::failures()) {
            return false;
        } else {
            $sent = new KKKK();
            $sent->user_inviter_id = $request->user_event_id;
            $sent->user_invited_id = $request->user;
            $sent->event_id = $request->event;

            $sent->save();

        }
        return redirect(route('manage'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aa($id)
    {
        return view('frontend.Event.manage');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request()
    {
        return view('frontend/Event/request');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accept()
    {
        return view('frontend/Event/email');
    }

    public function test()
    {
        return view('frontend/Event/test');
    }

    public function notification(Request $requests, $id)
    {
        $requests = \App\Models\Request::where('event_id', $id)->get();
        $requester_id = array();
        foreach ($requests as $item) {
            array_push($requester_id, $item->user_requester_id);
        }
        $user_requester_id = User::whereIn('id', $requester_id)->get();
//        return view('frontend/Event/notification', compact('requests', 'user_requester_id'));

        /*
         * view and values of nav bar
         */

        $events = Event::where('user_id', \auth()->id())->get();
        $requests = \App\Models\Request::where('user_requested_id', auth()->id())->get();
        $user_reguester = array();
        if (count($events) > 0) {
            if (count($requests) > 0) {
                foreach ($requests as $item) {
                    array_push($user_reguester, $item->user_requester_id);
                }

                $user_reguester_ids = User::whereIn('id', $user_reguester)->get();

                return view('frontend/Event/notification', compact('events', 'requests', 'user_reguester_ids', 'user_requester_id'));
            } else
                $user_reguester_ids = null;
            return view('frontend/Event/notification', compact('events', 'requests', 'user_reguester_ids', 'user_requester_id'));

        } else {
            $events = null;
            if (count($requests) > 0) {
                foreach ($requests as $item) {
                    array_push($user_reguester, $item->user_requester_id);
                }

                $user_reguester_ids = User::whereIn('id', $user_reguester)->get();

                return view('frontend/Event/notification', compact('events', 'requests', 'user_reguester_ids', 'user_requester_id'));
            } else
                $user_reguester_ids = null;
            return view('frontend/Event/notification', compact('events', 'requests', 'user_reguester_ids', 'user_requester_id'));

        }
    }

    public function user_notifications($id, $user)
    {
        $request = \App\Models\Request::where([
            ['event_id', $id],
            ['user_requester_id', $user]
        ])->first();
        $request->confirmed = 1;
        $request->update();
        return redirect()->back()->withFlashSuccess('confirmed!!');
    }

    public function participate(Request $request)
    {
        $email = $request->email;
        Mail::to($email)
            ->send(new EmailInvitation($request->event));

        if (Mail::failures()) {
            return false;
        } else {
            $sent = new Participate();
            $sent->first_name = $request->first_name;
            $sent->last_name = $request->last_name;
            $sent->title = $request->title;
            $sent->email = $request->email;
            $sent->save();

        }
        return redirect(route('manage'));
    }

    public function searchdata()
    {
        if (\request('key')!=''){
            $events=Event::all();
        }
        $events=Event::where('title','LIKE', '%'.request('key').'%')->get();
        return Response::json(['status' => true, 'data' => $events]);

    }



    public  function  saveEvent($id){
        $event = Event::findOrfail($id);
        dd($event);

    }

}

