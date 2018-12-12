@extends('layouts.main')

@section('title', 'About Author')

@section('header')
    <header class="masthead" style="background-image: url('{{asset('frontend')}}/img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>About {{ $author->name }}</h1>
              @php
                  $postCount = $author->posts->count()
              @endphp
              <span class="subheading">{{ $author->name }} have {{ $postCount}} {{ str_plural('posts', $postCount) }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2>Bio:</h2>
                <p>{{ $author->bio }}</p>
                <h2>Posts:</h2>
                <ul>
                    @foreach ($posts as $post)
                        <li><a href="{{ route('blog.single', $post->slug) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
