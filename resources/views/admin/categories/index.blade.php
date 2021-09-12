<x-dashboard-layout title="Categories" active="active">

    <x-alert  type="info">

        <x-slot name="action">

            <a href="#" class="btn btn-danger"> Action button</a>
        </x-slot>
        <p>Hello Mohammad</p>

     </x-alert>

            <h2 class="mb-4">Categories List</h2>
            <div class="table-toolbar">
            <a href="{{route('admin.categories.create')}}" class="btn btn-info mb-3"> create</a>
            </div>
            <form action="/admin/categories" method="get" class="d-flex mb-4">
                <div>
                    <input type="text" name="search" class="form-control" placeholder="search by name">

                </div>


                <select name="parent_id" class="form-select me-2">
                    <option value="">All Categories</option>
                    @foreach ($parants as $parent)
                        <option value="{{$parent->id}}"> {{$parent->name}}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-secondary">Filter</button>
            </form>
            <table class="table">

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>parent_ID</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>

                <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->status}}</td>
                        <td>{{ $category->created_at}}</td>
                        <td>{{$category->parant->name}}</td>
                        <td><a href="{{ route('admin.categories.edit',[$category->id])}}" class="btn btn-dark">Edit</a></td>

                        <td>
                            <form method="post" action="{{ route('admin.categories.delete',$category->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </x-dashboard-layout>

