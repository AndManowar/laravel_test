<?php
/**
 * Created by PhpStorm.
 * User: manowartop
 * Date: 10.05.18
 * Time: 12:43
 */
?>
@extends('layouts.admin.login')
@section('content')
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login</span>
                </h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" action="{{route('admin.login')}}">
                        {!! csrf_field() !!}
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="email" name="email" class="form-control form-control-lg input-lg" value="{{ old('email') }}"
                                   placeholder="Email">
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </fieldset>
                        <br>
                        <fieldset
                                class="form-group position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg input-lg" name="password"
                                   placeholder="Password" required="" value="{{old('password')}}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="" class="card-link">Forgot
                                    Password?</a></div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i>
                            Login
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="" class="card-link">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
