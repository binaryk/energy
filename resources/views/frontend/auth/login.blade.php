@extends('frontend.layouts.master')

@section('content')
    <div class="app signin v2 usersession">
        <div class="session-wrapper">
            <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active" style="background-image:url(http://lorempixel.com/1200/800);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
                    </div>
                    <div class="item" style="background-image:url(http://lorempixel.com/1200/800?2);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
                    </div>
                    <div class="item" style="background-image:url(http://lorempixel.com/1200/800?3);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
                    </div>
                </div>
            </div>
            <div class="card bg-white no-border">
                <div class="card-block">
                    {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}
                        <div class="text-center m-b">
                            <h4 class="text-uppercase">Bine ați venit!</h4>
                            <p>Te rugăm să te loghezi</p>
                        </div>
                        <div class="form-inputs p-b">
                            <div class="form-group">
                                {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('email', 'email', old('email'), ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::input('password', 'password', null, ['class' => 'form-control input-lg']) !!}
                                </div>
                            </div>
                            <a href="{!! url('password/email') !!}">Ați uitat parola?</a>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg m-b" type="submit">Intră</button>
                        <div class="divider">
                            <span>Sau</span>
                        </div>
                        <a class="btn btn-block no-bg btn-lg m-b" href="{!! url('auth/register') !!}">Fă un cont</a>
                        <p class="text-center"><small><em>Prin logare dvs acceptați <a href="#">termenii și condițiile</a> platformei</em></small>
                        </p>
                    </form>
                </div>
            </div>
            <div class="push"></div>
        </div>
    </div>
@endsection