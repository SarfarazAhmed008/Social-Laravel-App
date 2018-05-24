@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('includes.show_message')
    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <header><h3>What is going on?</h3></header>
            <form action="{{ route('create.status') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="5" placeholder="Enter status...."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}" >
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 offset-md-3">
            <header><h3>What other people say..</h3></header>
            @foreach($statuses as $status)
            <article class="post" data-postid = "{{ $status->id }}">
                @if(Storage::disk('local')->has($status->user->first_name . '-' . $status->user->id . '.jpg'))
                    <img src="{{ route('account.image', ['filename' => $status->user->first_name . '-' . $status->user->id . '.jpg']) }}" alt="No Image" class="img-fluid rounded custom">
                @endif
                <p>{{ $status->body }}</p>
                <div class="info">
                    Posted by {{ $status->user->first_name }} on {{ $status->created_at }}
                </div>
                <div class="interaction">
                    <a href="#" class="like">{{ Auth::user()->likes()->where('status_id', $status->id)->first() ? Auth::user()->likes()->where('status_id', $status->id)->first()->like == 1 ? 'You like this status' : 'Like' : 'Like' }}</a> |
                    <a href="#" class="like">{{ Auth::user()->likes()->where('status_id', $status->id)->first() ? Auth::user()->likes()->where('status_id', $status->id)->first()->like ==  0 ? 'You don\'t like this status' : 'Dislike' : 'Dislike' }}</a>
                    @if(Auth::user() == $status->user)
                    |
                    <a href="#" class="edit">Edit</a> |
                    <a href="{{ route('delete.status', ['status_id' => $status->id]) }}">Delete</a>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <!-- Button trigger modal -->
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
        {{--Launch demo modal--}}
    {{--</button>--}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="status-body">Edit your status</label>
                            <textarea name="status-body" id="status-body" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit-modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
        var token = '{{ Session::token() }}';

    </script>
@endsection

