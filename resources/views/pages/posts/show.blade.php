@extends('layouts.app')

@section('title')
    Card
@endsection

@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="card">
                <a href="{{ route('posts.index') }}" class="btn btn-primary my-2" style="width: 8rem;">Go back</a>
                <img style="height: 400px;" src="{{ $post->cover }}" alt="post_image" />
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ \Str::limit($post->description, 10) }} <a
                            href="{{ route('details', $post->id) }}">view
                            more!</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
