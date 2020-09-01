<x-admin-master>
  @section('content')
  
  <h1>Create</h1>
  <div class="col-sm-6">
  <form method="post" action="{{route('role.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
  <label for="title">Name</label>
  <input type="text" name="name" id="name" class="form-control" aria-describedby="" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="title">Slug</label>
    <input type="text" name="slug" id="slug" class="form-control" aria-describedby="" placeholder="Enter Slug">
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  
  
  </form>
  
</div>
  @endsection
  
  </x-admin-master>