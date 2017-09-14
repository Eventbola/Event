<table class="table table-striped table-hover">
    <tr>
        <th>{{ trans('labels.frontend.user.profile.avatar') }}</th>
        <td>
            <img src="{{asset('img/profile')}}/{{Auth::user()->image}}" style="width: 100px;height: 100px">
            <form enctype="multipart/form-data" action="{{route('account')}}" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="image">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.name')}}</th>
        <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.email')}}</th>
        <td>{{  Auth::user()->email }}</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.created_at') }}</th>
        <td>{{  Auth::user()->created_at }} ({{ $logged_in_user->created_at->diffForHumans() }})</td>
    </tr>
    <tr>
        <th>{{ trans('labels.frontend.user.profile.last_updated') }}</th>
        <td>{{ Auth::user()->updated_at }} ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
    </tr>
</table>