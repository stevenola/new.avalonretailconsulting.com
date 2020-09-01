<x-admin-master>

@section('content')
   
<div class="pt-5">
<h1>Users</h1>
</div>
    {{-- This if statement works with code below to create deleted msg --}}
    @if (session('user-deleted'))
       <div class="alert alert-danger"> {{session('user-deleted')}}</div>
    @endif

    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Name</th>
                {{-- <th>Role</th> --}}
                <th>Email</th>
                <th>Register Date</th>
                <th>Update Date</th>
                <th>Avatar</th>
                <th>Delete</th>
            
                
              </tr>
            </thead>
 
            <tbody>
              @foreach ($users as $user)
  
              <tr>
              
              <td>{{$user->id}}</td>
              <td>{{$user->username}}</td>
              <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>              
              {{-- <td>{{$role->name}}</td> --}}
              <td>{{$user->email}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
              <td>
                <img height="50px" src="{{$user->avatar}}" alt="">
              </td>
              <td>
              <form method="post" action="{{route('user.destroy', $user->id)}}">
              @csrf
              @method('DELETE')

                  <button class="btn btn-danger">Delete</button>              
              
              </form>
              </td>
           
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
{{-- create page links --}}
    {{-- <div class="col-12 d-flex justify-content-center">
      {{$users->links()}}
    </div> --}}
@endsection
@section('scripts')
    
  <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  {{-- code for plugin pagination --}}
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
@endsection


</x-admin-master>