<!-- resources/views/auth/reset.blade.php -->
@extends('frontend.master')

@section('content')

    <div class="col-lg-12" align="center" style="margin-top: 100px">
<form method="POST" action="/password/reset">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

    <h2 class="title text-center">Reset Password</h2>

    <div class="input-group input-group-lg">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
    </div>



    <div class="input-group input-group-lg">
        <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
    </div>




    <div class="input-group input-group-lg">
        <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation" aria-describedby="sizing-addon1">
    </div>



    <div style="margin-left: 10px;margin-top: 10px">
        <button type="submit" class="btn btn-success">Reset</button>
    </div>
</form>
    </div>

@stop