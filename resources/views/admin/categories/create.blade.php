@extends('layouts.dashboard')
@section('content')
        <h2 class="my-5 "> {{$title}}</h2>

          @if(session()->has('success'))

            <div class="alert alert-info">
                <?= session()->get('success')?>
            </div>

        @endif

          @if(session()->has('status'))

            <div>
                <?= session()->get('status')?>
                <?= session()->forget('status')?>
            </div>

        @endif

        <form method="post" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
          @csrf
           @include('admin.categories._form',['button_labe'=>'Add'])





        </form>

@endsection
