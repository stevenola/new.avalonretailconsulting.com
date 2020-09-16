<x-admin-master>
 
  @section('content')
  <div class="row ">
  <div class="col-lg-12">
<h1>Edit Permission: {{$permission->name}}</h1>
  
  <form method="post" action="{{route('permission.update', $permission->id)}}" enctype="multipart/form-data">
    @csrf
    {{-- The method tells laravel we want to update the role --}}
    @method('PUT')
  <div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="" placeholder="Enter Name" value="{{$permission->name}}">
  <div>
    {{-- creates error message --}}
    @error('name')
    <span><strong class="text-danger">{{$message}}</strong></span>    
    @enderror  
    </div>  
  </div>
 
  <button type="submit" class="btn btn-primary">Update</button>
  
  
  </form>
</div>
</div>




  @endsection
  
  </x-admin-master>