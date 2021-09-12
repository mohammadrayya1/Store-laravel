<x-dashboard-layout title="Categories">
    <h2 class="my-5 "> {{$title}}</h2>



    <form method="post" action="/admin/categories/{{$id}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('admin.categories._form',['button_labe'=>'Update'])


    </form>

</x-dashboard-layout>
