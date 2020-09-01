<x-admin-master>
  @section('content')
  
  <h1>Edit Role</h1>
  
  <form method="post" action="{{route('role.update', $role->id)}}" enctype="multipart/form-data">
    @csrf
    {{-- The method tells laravel we want to update the role --}}
    @method('PUT')
  <div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control" aria-describedby="" placeholder="Enter Name" value="{{$role->name}}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" aria-describedby="" placeholder="Enter Slug" value="{{$role->slug}}">
    </div>
  
 
  <button type="submit" class="btn btn-primary">Update</button>
  
  
  </form>
  
  
  @endsection
  
  </x-admin-master>