<x-admin-master>
@section('content')

<h1>Create</h1>

<form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
  @csrf
<div class="form-group">
<label for="title">Title</label>
<input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="" placeholder="Enter Title">
    {{-- creates error message --}}
    @error('title')
    <span><strong class="text-danger">{{$message}}</strong></span>    
    @enderror  
    </div>  
  </div>
</div>

<div class="form-group">
  <label for="file">File</label>
  <input type="file" name="post_image" id="post_image" class="form-control-file">
<div>
@error('name')
<span><strong>{{$message}}</strong></span>    
@enderror  
</div>  

</div>
  <div class="form-group">
    <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="10"></textarea>
      {{-- creates error message --}}
      @error('body')
      <span><strong class="text-danger">{{$message}}</strong></span>    
      @enderror  
      </div>  
    </div>
  </div>

<button type="submit" class="btn btn-primary">Submit</button>


</form>


@endsection

</x-admin-master>
