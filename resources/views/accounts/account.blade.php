@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">Your first name: </label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="image">Upload profile picture (only .jpg): </label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Update profile</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </section>
    @if(Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 offset-md-3">
                <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-fluid rounded">
            </div>
        </section>
    @endif

@endsection