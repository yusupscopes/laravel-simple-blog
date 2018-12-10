@extends('layouts.main')

@section('title', 'Blog Index')

@section('header')
    <header class="masthead" style="background-image: url('{{asset('frontend')}}/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Index Blog</h1>
              <span class="subheading">A Blog by Admin</span>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection

@section('content')
    <div class="post-preview">
        @if (!$posts->count())
            <div class="alert alert-warning">
                <p>Nothing Found</p>
            </div>
        @else
            @foreach ($posts as $post)
                <a href="{{ route('blog.single', $post->slug) }}">
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        Problems look mighty small from 150 miles up
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{ $post->author->name }}</a>
                    on {{ $post->created_at }}</p>
            @endforeach
        @endif
    </div>
    <hr>

    <!-- Pager -->
    <div class="clearfix">
      {{$posts->links()}}
    </div>
@endsection