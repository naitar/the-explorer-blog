@extends('master')
@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        @auth
          <div class="border p-4 d-flex justify-content-between align-items-center mb-4"> 
            <h3> 
            Welcome <br>
            <span class="fw-bold text-black">{{ auth()->user()->name }}</span>
            </h3>
          <a href="{{ route('post.create') }}" class="btn btn-primary">Create</a>
          </div>
        @endauth
      
            
      <div class="posts">
        @forelse ($posts as $post )
        <div class="post mb-4">
          <div class="row ">
            <div class="col-lg-4">
              <img src="{{ asset('storage/cover/'.$post->cover) }}" alt="" class="cover-img w-100 rounded-3">
            </div>
            <div class="col-lg-8 d-flex flex-column  justify-content-between my-4">
              <div class="">
                <h4 class="fw-bold"> {{ $post->title }} </h4>
                <p class="text-black-50">
                  {{ $post->excerpt }}
                </p>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                  <img src="{{ asset($post->user->photo) }}" alt="" class="user-img">                  
                  <p class="text-black-50 ms-2 small">
                    {{ $post->user->name}} <br>
                    <i class="fas fa-calendar"></i>
                    {{ $post->created_at->format('d M Y') }}
                  </p>                                
                  
                </div>
                <a href="" class="btn btn-primary rounded-3">Read More</a>
              </div>

            </div>
          </div>
        </div>  
        
        @empty
          <p class="text-muted"> post is empty</p>
        @endforelse
        
      </div>

      


    </div>
    </div>
  </div>

@stop