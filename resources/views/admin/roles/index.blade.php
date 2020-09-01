<x-admin-master>

  @section('content')
     
  <div class="pt-5">
  <h1>Roles</h1>
  </div>
<div class="col-sm-9">
      {{-- This if statement works with code below to create deleted msg --}}
      @if (session('user-deleted'))
         <div class="alert alert-danger"> {{session('role-deleted')}}</div>
      @endif
  
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>   
                  <th>Name</th>
                  <th>Delete</th>

                </tr>
              </thead>
   
              <tbody>
                @foreach ($roles as $role)
    
                <tr>
                
                <td>{{$role->id}}</td>
                <td><a href="{{route('role.edit', $role->id)}}">{{$role->name}}</a></td>              
                <td>
                <form method="post" action="{{route('role.destroy', $role->id)}}">
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