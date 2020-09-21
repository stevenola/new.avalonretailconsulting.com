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

    <div class="form-group">
      <label for="cagetory_id">Category</label>
      <select type="text" name="category_id" id="category_id" class="form-control 
      @error('category_id') is-invalid @enderror" aria-describedby="" placeholder="Enter Category">
         @foreach ($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
         @endforeach
        </select>
      
      {{-- creates error message --}}
          @error('category_id')
          <span><strong class="text-danger">{{$message}}</strong></span>    
          @enderror  
        
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

<div class="form-group">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>


@endsection

</x-admin-master>
