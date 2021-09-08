@extends('layouts.dashboard')
@section('content')

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
@if(session()->has('successdelete'))

    <div class="alert alert-danger">
        {{session()->get('successdelete')}}

    </div>

@endif
@if(session()->has('not_exist'))

    <div class="alert alert-danger">
        {{session()->get('not_exist')}}

    </div>

@endif

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
                        <td>{{$category->parent_name}}</td>
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
            @endsection
