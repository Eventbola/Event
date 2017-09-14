@extends('frontend.layouts.app')
    @include('event.includes.nav')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                {{--<div class="col-md-4">--}}
                    {{--<ul class="list-group">--}}
                        {{--<li class="list-group-item"><a href=""><span class="">Change password</span></a></li>--}}
                        {{--<li class="list-group-item"><a href=""><span class="">Change profile</span></a></li>--}}
                        {{--<li class="list-group-item"><a href=""><span class="">Change Email</span></a></li>--}}
                        {{--<li class="list-group-item"><a href=""><span class="">Change Data</span></a></li>--}}

                    {{--</ul>--}}
                {{--</div>--}}
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">{{ trans('labels.frontend.auth.login_box_title') }}</div>
                        <div class="panel-body">
                            {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'form-horizontal']) }}

                            <div class="form-group">
                                {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-6">
                                    {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            <div class="form-group">
                                {{ Form::label('password', trans('validation.attributes.frontend.password'), ['class' => 'col-md-4 control-label']) }}
                                <div class="col-md-6">
                                    {{ Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                        </label>
                                    </div>
                                </div><!--col-md-6-->
                            </div><!--form-group-->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) }}

                                    {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
                                </div><!--col-md-6-->
                            </div><!--form-group-->

                            {{ Form::close() }}

                            {{--<div class="row text-center">--}}
                            {{--{!! $socialite_links !!}--}}
                            {{--</div>--}}
                        </div><!-- panel body -->

                    </div><!-- panel -->

                </div><!-- col-md-8 -->

            </div><!-- row -->
        </div>
    @endsection