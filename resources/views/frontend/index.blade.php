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
            @if (isset($categoryName))
                <div class="alert alert-info">
                    <p>Category: <strong>{{ $categoryName }}</strong></p>
                </div>
            @endif
            @if (isset($authorName))
                <div class="alert alert-info">
                    <p>Author: <strong>{{ $authorName }}</strong></p>
                </div>
            @endif

            {!! Form::open(['route' => 'blog', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Search For...']) !!}
                </div>
            {!! Form::close() !!}

            @foreach ($posts as $post)
                <a href="{{ route('blog.single', $post->slug) }}">
                    <h2 class="post-title">
                        {{ $post->title }}
                    </h2>
                </a>
                <p class="post-meta">Posted by
                    <a href="{{ route('author', $post->author->slug ) }}">{{ $post->author->name }}</a>
                    on {{ $post->created_at }} || Category: <a href="{{ route('category', $post->category->slug) }}"> {{ $post->category->title }}</a></p>
            @endforeach
        @endif
    </div>
    <hr>

    <!-- Pager -->
    <div class="clearfix">
      {{$posts->appends(request()->only(['q']))->links()}}
    </div>
@endsection
