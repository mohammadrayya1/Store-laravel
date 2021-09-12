


@if(session()->has('success'))

    <div class="alert alert-secondary">
        {{session()->get('success')}}

    </div>

@endif
@if(session()->has('successUpdate'))

    <div class="alert alert-secondary">
        {{session()->get('successUpdate')}}

    </div>

@endif
@if(session()->has('successdelete') )

    <div class="alert alert-danger">

        {{session()->get('successdelete')}}

    </div>

@endif

@if(session()->has('not_exist'))

    <div class="alert alert-danger">
        {{session()->get('not_exist')}}

    </div>

@endif


@if(session()->has('Info'))

    <div class="alert alert-info">
        {{session()->get('Info')}}

    </div>

@endif

@if(isset($action))

    <div class="alert alert-{{$type?? 'info'}}">
        {{$action}}
        {{$slot}}

    </div>

@endif

