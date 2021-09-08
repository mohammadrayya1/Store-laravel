<div class="form-group mb-3">
    <label  for ="name"  >Name:</label>
    <input type="text" name="name" value="{{$categories->name}}" id="name" class="form-control" >
</div>


<div class="form-group mb-3">
    <label  for ="parent_id"  >parentID:</label>
    <select name="parent_id" class="form-select" >


        @foreach ($parants as $parent)
            <option value="{{$parent->id}}" @if($parent->id==$categories->parent_id) selected  @endif>{{$parent->name}} </option>
        @endforeach
    </select>

</div>



        <div class="form-group mb-3">
            <label  for ="description"  >Description:</label>
            <textarea name="description"   class="form-control">{{$categories->description}}</textarea>
        </div>

        <div class="form-group mb-3">
            <label  for ="image"  >Image:</label>
            <input type="file" name="image" id="image"  class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label  for ="status"  >Status:</label>
            <div>
                <label>
                    <input type="radio" name="status" value="active" @if('active'==$categories->status) checked  @endif>
                    Active</label>
                <label>
                    <input type="radio" name="status" value="inactive"  @if('inactive'==$categories->status)  checked @endif>
                    inActive</label>
            </div>
        </div>


    <button type="submit"  class="btn btn-primary" >{{$button_labe ?? 'save'}}</button>
