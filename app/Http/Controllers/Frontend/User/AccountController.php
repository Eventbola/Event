<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Event;
use App\Models\SaveEvent;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $save_events = SaveEvent::where('user_id', \auth()->id())->get();
        $events = Event::all();
        if (count($save_events) > 0) {
            return view('frontend.user.account', compact('save_events', 'events', 'array_user_store_event'));
        } else {
            $save_events = null;
            return view('frontend.user.account', compact('save_events', 'events', 'array_user_store_event'));
        }
    }
}
