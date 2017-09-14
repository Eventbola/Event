<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Request;
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
    public function index()
    {
        return view('event.index');
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
        $userInvited = Request::where([
            ['event_id', \request('event_id')],
            ['user_inviter_id', auth()->user()->id]
        ])->get();

       // dd($userInvited);

        $arrayUserInvited = array();
        if(count($userInvited) >0){
            foreach ($userInvited as $item){
                array_push($arrayUserInvited, $item->user_invited_id);
            }
        }

        $restrict = array(1, 2, 3, auth()->user()->id);

        foreach ($restrict as $item){
            array_push($arrayUserInvited, $item);
        }

        $users = DB::table('users')
            ->whereNotIn('id', $arrayUserInvited)
            ->get();


        return Response::json(['status' => true, 'data' => $users, 'user_id' => auth()->user()->id]);
    }
}
