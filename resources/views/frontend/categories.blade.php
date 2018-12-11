@extends('layouts.main')

@section('title', 'Blog Categories')

@section('header')
    <header class="masthead" style="background-image: url('{{asset('frontend')}}/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Blog Categories</h1>
              <span class="subheading">A Blog by Admin</span>
            </div>
          </div>
        </div>
      </div>
    </header>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card border-primary mb-3 mx-3" style="max-width: 18rem;">
                        <div class="card-header"></div>
                        <div class="card-body text-primary">
                            <h5 class="card-title"><a href="#">{{ $category->title }}</a></h5>
                            <p class="card-text">Some quick example text.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
