@if($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $message)
                <li class=""> {{$message}}</li>
            @endforeach
        </ul>
    </div>
@endif






<div class="form-group mb-3">
    <label  for ="name"  >Name:</label>
    <input type="text" name="name" value="{{old('name',$categories->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" >
        @error('name')
        <p class="invalid-feedback d-block"> {{$message}}</p>
        @enderror
</div>


<div class="form-group mb-3">
    <label  for ="parent_id"  >parentID:</label>
    <select name="parent_id" class="form-select" >


        @foreach ($parants as $parent)
            <option value="{{$parent->id}}" @if($parent->id==old('parent_id','$categories->parent_id')) selected  @endif>{{$parent->name}} </option>
        @endforeach
    </select>
    @error('parent_id')
    <p class="invalid-feedback d-block"> {{$message}}</p>
    @enderror
</div>



        <div class="form-group mb-3">
            <label  for ="description"  >Description:</label>
            <textarea name="description"   class="form-control">{{old('description',$categories->description)}}</textarea>
        </div>
        @error('description')
        <p class="invalid-feedback d-block"> {{$message}}</p>
        @enderror

        <div class="form-group mb-3">
            <label  for ="image"  >Image:</label>
            <input type="file" name="image" id="image"  class="form-control" >
        </div>
        @error('image')
        <p class="invalid-feedback d-block"> {{$message}}</p>
        @enderror

<div class="form-group mb-3">
            <label  for ="status"  >Status:</label>
            <div>
                <label>
                    <input type="radio" name="status" value="active" @if('active'==old('status',$categories->status)) checked  @endif>
                    Active</label>
                <label>
                    <input type="radio" name="status" value="inactive"  @if('inactive'==old('status',$categories->status))  checked @endif>
                    inActive</label>
            </div>
        </div>
            @error('status')
            <p class="invalid-feedback d-block"> {{$message}}</p>
            @enderror


    <button type="submit"  class="btn btn-primary" >{{$button_labe ?? 'save'}}</button>
