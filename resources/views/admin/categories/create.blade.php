<x-dashboard-layout title="Categories">
        <h2 class="my-5 "> {{$title}}</h2>

        <x-alert>
        </x-alert>

        <form method="post" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
          @csrf
           @include('admin.categories._form',['button_labe'=>'Add'])

        </form>
</x-dashboard-layout>
