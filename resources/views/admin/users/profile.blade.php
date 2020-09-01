<x-admin-master>
@section('content')
    
<h1>User Profile For : {{$user->name}}</h1>

<div class="row">
<div class="col-sm-6">
<form method="post" action="{{route('user.profile.update',$user)}}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-4">
<img id="avatar-image" class="img-fluid rounded-circle" src="{{$user->avatar}}" alt="">
</div>
<div class="form-group">
  <input type="file" name="avatar">

  @error('avatar')
  <div class="invalid-feedback d-block">{{$message}}</div>    
    @enderror
</div>
<div class="form-group">
  <label for="">Username</label>
  <input type="text" name="username" class="form-control"  id="username" value="{{$user->username}}">
  @error('username')
<div class="invalid-feedback d-block">{{$message}}</div>    
  @enderror
  </div>


<div class="form-group">
<label for="">Name</label>
<input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
@error('name')
<div class="invalid-feedback d-block">{{$message}}</div>    
  @enderror
</div>

{{-- <div class="form-group">
  <label for="">Role</label>
  <input type="text" name="roles" class="form-control" id="roles" value="{{$roles->id}}">
  @error('roles')
  <div class="invalid-feedback d-block">{{$message}}</div>    
    @enderror
  </div> --}}

<div class="form-group">
  <label for="">Email</label>
  <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
  @error('email')
  <div class="invalid-feedback d-block">{{$message}}</div>    
    @enderror
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control" id="password" >
    @error('password')
    <div class="invalid-feedback d-block">{{$message}}</div>    
      @enderror
    </div>
    <div class="form-group">
      <label for="password-confirmation">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="password-onfirmation" >
      @error('password_confirmation')
      <div class="invalid-feedback d-block">{{$message}}</div>    
        @enderror
      </div>


<button type="submit" class="btn btn-primary">Update</button>


</form>


</div>


</div>

<div class="row">
  <div class="col-sm-12">

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Options</th>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Attach</th>
                <th>Detach</th>
              
                
              </tr>
            </thead>
      
            <tbody>
              @foreach ($roles as $role)

              <tr>
              
              <td><input type="checkbox" @foreach ($user->roles as $user_role)
                  @if($user_role->slug == $role->slug)
                  checked
                  @endif
              @endforeach></td>
                <td>{{$role->id}}</td>
              <td>{{$role->name}}</td>
              <td>{{$role->slug}}</td>
              
              <td>
              <form method="post" action="{{route('user.role.attach', $user)}}">
                @method('PUT')
                @csrf

              <input type="hidden" name="role" value="{{$role->id}}">
                <button class="btn btn-primary" @if($user->roles->contains($role))disabled @endif>Attach</button>
              </form>
              </td>

                <td>
                  <form method="post" action="{{route('user.role.detach', $user)}}">
                    @method('PUT')
                    @csrf
    
                  <input type="hidden" name="role" value="{{$role->id}}">
                    <button 
                    type="submit" class="btn btn-danger"  
                    @if(!$user->roles->contains($role))
                    disabled 
                    @endif
                    >Detach
                  </button>
              </form>
            </td>
            
              
          
              
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection

</x-admin-master>