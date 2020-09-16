<x-admin-master>

  @section('content')
     
  <div class="pt-5">
  <h1>Permissions</h1>
  </div>
<div class="col-sm-9">
         {{-- This if statement works with code below to create updated msg --}}
         @if (session('permission-created'))
         <div class="alert alert-success"> {{session('permission-created')}}</div>
      @endif
      {{-- This if statement works with code below to create deleted msg --}}
      @if (session('permission-deleted'))
         <div class="alert alert-danger"> {{session('permission-deleted')}}</div>
      @endif
       {{-- This if statement works with code below to create updated msg --}}
       @if (session('permission-updated'))
       <div class="alert alert-success"> {{session('permission-updated')}}</div>
    @endif
  
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>   
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Delete</th>

                </tr>
              </thead>
   
              <tbody>
                @foreach ($permissions as $permission)
    
                <tr>
                
                <td>{{$permission->id}}</td>
                <td><a href="{{route('permission.edit', $permission->id)}}">{{$permission->name}}</a></td>              
                {{-- <td>{{$permission->name}}</td> --}}
                  <td>{{$permission->slug}}</td>
                  <td>
                <form method="post" action="{{route('permission.destroy', $permission->id)}}">
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