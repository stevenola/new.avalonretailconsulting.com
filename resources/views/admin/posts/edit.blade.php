<x-admin-master>
  @section('content')
  
  <h1>Edit Post</h1>
  
  <form method="post" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
    @csrf
    {{-- The method tells laravel we want to update the post --}}
    @method('PATCH')
  <div class="form-group">
  <label for="title">Title</label>
  <input type="text" name="title" id="title" class="form-control" aria-describedby="" placeholder="Enter Title" value="{{$post->title}}">
  </div>
  
  <div class="form-group">
  <div><img height="100px" src="{{$post->post_image}}" alt=""></div>
    <label for="file"></label>
    <input type="file" name="post_image" id="post_image" class="form-control-file">
    </div>
    <div class="form-group">
      <textarea name="body" class="form-control" id="body" cols="30" rows="10" >{{$post->body}}</textarea>
    </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
  
  
  </form>
  
  
  @endsection
  
  </x-admin-master>
  