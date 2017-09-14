<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
//use App\Http\Requests\Request;
use App\Repositories\Frontend\Access\User\UserRepository;

use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ProfileController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param UpdateProfileRequest $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
//        dd($request->all());
        $output = $this->user->updateProfile(access()->id(), $request->only('first_name', 'last_name', 'email'));
        // E-mail address was updated, user has to reconfirm
        if (is_array($output) && $output['email_changed']) {
            access()->logout();
            return redirect()->route('frontend.auth.login')->withFlashInfo(trans('strings.frontend.user.email_changed_notice'));
        }
        return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }

    public function update_avatar(Request $request){
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/img/profile/' . $filename ) );
            $user = Auth::user();
            if ($user->image != "default.jpg") {
                unlink(public_path('/img/profile/' . $user->image));
            }
            $user->image = $filename;
            $user->save();
        }
        return redirect()->route('frontend.user.account',array('user' => Auth::user()));
    }

}
