<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\KKKK;
use App\Models\Event;
//use App\Models\Event;
use App\Models\Request;
use App\Models\SaveEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $events = Event::all();
        if (count($save_events) > 0) {
            return view('event.index', compact('save_events', 'events', 'array_user_store_event'));
        } else {
            $save_events = null;
            return view('event.index', compact('save_events', 'events', 'array_user_store_event'));
        }
    }

        public function index()
    {
        $event = Event::get()->all();
        return view('frontend.auth.index', compact('event'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    public function getInvitedUsers()
    {
        $userInvited = KKKK::where([
            ['event_id', \request('event_id')],
            ['user_inviter_id', auth()->user()->id]
        ])->get();

        // dd($userInvited);

        $arrayUserInvited = array();
        if (count($userInvited) > 0) {
            foreach ($userInvited as $item) {
                array_push($arrayUserInvited, $item->user_invited_id);
            }
        }

        $restrict = array(1, 2, 3, auth()->user()->id);

        foreach ($restrict as $item) {
            array_push($arrayUserInvited, $item);
        }

        $users = DB::table('users')
            ->whereNotIn('id', $arrayUserInvited)
            ->where('confirmed', 1)
            ->get();


        return Response::json(['status' => true, 'data' => $users, 'user_id' => auth()->user()->id]);
    }
}
