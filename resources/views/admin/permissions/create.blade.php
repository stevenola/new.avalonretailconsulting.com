<x-admin-master>
  @section('content')
  
  <h1>Create Permission</h1>
  <div class="col-sm-6">
  <form method="post" action="{{route('permission.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
  <label for="title">Name</label>
  {{-- error code makes entry box red if there is an error --}}
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="" placeholder="Enter Name">
  <div>
    {{-- creates error message --}}
    @error('name')
    <span><strong class="text-danger">{{$message}}</strong></span>    
    @enderror  
    </div>  
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
  
  
  </form>
  
</div>
  @endsection
  
  </x-admin-master>