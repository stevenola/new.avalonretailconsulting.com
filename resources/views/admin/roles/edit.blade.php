<x-admin-master>
 
  @section('content')
  <div class="row ">
  <div class="col-lg-12">
<h1>Edit Role: {{$role->name}}</h1>
  
  <form method="post" action="{{route('role.update', $role->id)}}" enctype="multipart/form-data">
    @csrf
    {{-- The method tells laravel we want to update the role --}}
    @method('PUT')
  <div class="form-group">
  <label for="name">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="" placeholder="Enter Name" value="{{$role->name}}">
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

<div class="row pt-5">
<div class="col-lg-12">
@if($permissions->isNotEmpty())
    

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Options</th> 
              <th>Id</th>   
              <th>Name</th>
              <th>Slug</th>
              <th>Attach</th>
              <th>Detach</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($permissions as $permission)

            <tr>
              <td><input type="checkbox" @foreach ($role->permissions as $role_permission)
                @if($role_permission->slug == $permission->slug)
                checked
                @endif
            @endforeach></td>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</a></td>              
            
              <td>{{$permission->slug}}</td>
            
              <td>
                <form method="post" action="{{route('role.permission.attach', $role)}}">
                  @method('PUT')
                  @csrf
  
                <input type="hidden" name="permission" value="{{$permission->id}}">
                  <button class="btn btn-primary" @if($role->permissions->contains($permission))disabled @endif>Attach</button>
                </form>
                </td>
                <td>
                  <form method="post" action="{{route('role.permission.detach', $role)}}">
                    @method('PUT')
                    @csrf
    
                  <input type="hidden" name="permission" value="{{$permission->id}}">
                    <button class="btn btn-danger" @if(!$role->permissions->contains($permission))disabled @endif>Detach</button>
                  </form>
                  </td>
         
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @endif
</div>

</div>


  @endsection
  
  </x-admin-master>