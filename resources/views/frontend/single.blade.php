@extends('layouts.main')

@section('title', 'Blog Single page')

@section('header')
    <header class="masthead" style="background-image: url('{{asset('frontend')}}/img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $post->title }}</h1>
              <span class="meta">Posted by
                <a href="{{ route('author', $post->author->slug ) }}">{{ $post->author->name }}</a>
                on {{ $post->created_at }} || Category: <a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a></span>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection

@section('content')
    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              {!! $post->body_html !!}
          </div>
        </div>
      </div>
    </article>
@endsection
