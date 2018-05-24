@if(count($errors) > 0)
    <div class="alert alert-danger col-md-4 offset-md-4 error" role="alert" style="text-align: center;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(Session::has('fail'))
    <div class="alert alert-danger col-md-4 offset-md-4 fail" role="alert" style="text-align: center;">
        {{Session::get('fail')}}
    </div>
@endif
@if(Session::has('message'))
    <div class="alert alert-success col-md-4 offset-md-4 message" role="alert" style="text-align: center;">
        {{Session::get('message')}}
    </div>
@endif
