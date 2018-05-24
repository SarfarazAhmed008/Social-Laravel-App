@extends('layouts.master')

@section('title')
    Welcome to Social
@endsection

@section('content')
    <h3 style="color: dodgerblue">Welcome to Social</h3>
    @include('includes.show_message')
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('sign-up') }}" method="post">
                <div class="form-group">
                    <label for="email">Your Email: </label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" placeholder="Enter email" value="{{ Request::old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            Check Email
                        </div>
                    @endif
                </div>
                <div class="form-group has-error">
                    <label for="first_name">Your First Name:</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" placeholder="Enter first name" value="{{ Request::old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <div class="invalid-feedback">
                            Check First Name
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Your Password:</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" placeholder="Enter password" value="{{ Request::old('password') }}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            Check Password
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('sign-in') }}" method="post">
                <div class="form-group">
                    <label for="email">Your Email: </label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" placeholder="Enter email" value="{{ Request::old('email') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            Check Email
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Your Password:</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" placeholder="Enter password" value="{{ Request::old('password') }}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            Check Password
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection