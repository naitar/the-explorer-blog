@extends('master')
@section('title')
    Post Create : env('APP_NAME')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4>Create New Post</h4>
        <p>
          <i class="fas fa-calendar"></i>
          {{ date("d M Y") }}
        </p>
        </div>
        <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder="Title" value="{{ old('title') }}" > 
            <label for="floatingInput">Post Title</label>
            @error('title')
              <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <img src="{{ asset('placeholder.png')}}" class="w-100 rounded round-3 @error('cover')is-invalid @enderror" alt="" id="coverPreview">
            <input type="file" class="d-none" id="cover" name="cover" accept="image/jpeg,image/png,image/jpg">
            @error('cover')
              <div class="invalid-feedback ps-2">{{ $message }}</div>              
            @enderror
        </div>

        <div class="form-floating mb-4">
            <textarea name="description" class="form-control @error('description') is-invalid  @enderror" placeholder="Leave a comment here" id="floatingTextarea" style="height : 450px">{{ old('description') }}</textarea>
          <label for="floatingTextarea">Share Your Experience</label>
          @error('description')
            <div class="invalid-feedback ps-2">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-center mb-4">
          <button class="btn btn-lg btn-primary">
            <i class="fas fa-message"></i>
            Create Post</button>
        </div>

        </form>

      </div>
    </div>
  </div>

@endsection
@push('scripts')
<script>
  let coverPreview = document.querySelector("#coverPreview");
  let cover = document.querySelector('#cover');
  coverPreview.addEventListener('click',_=>cover.click());
  cover.addEventListener('change',_=>{
    console.log(cover.files);
    let file = cover.files[0];
    let reader = new FileReader();
    reader.onload = function(){
      coverPreview.src = reader.result;
    }
    console.log(reader.readAsDataURL(file));
  })
</script>
    
@endpush