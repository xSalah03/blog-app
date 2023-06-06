@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card rounded-0 shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>List posts</h5>
                        <a href="{{ route('posts.create') }}" class="btn btn-success">Create new post</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        @foreach ($posts as $post)
                            <div class="card-body" style="overflow: hidden">
                                <div class="card">
                                    <div class="img-box">
                                        <img style="height: 250px;" src="{{ $post->cover }}"
                                            alt="post_image" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }} </h5>
                                        <span class="">views: {{ $post->views }}</span>
                                        <p class="card-text">{{ \Str::limit($post->description, 20) }}</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Show</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">Update</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $post->id }}">
                                                Delete
                                            </button>
                                            <!-- Confirm Delete Modal -->
                                            <div class="modal fade" id="confirmDeleteModal{{ $post->id }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $post->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteModalLabel{{ $post->id }}">
                                                                Confirm Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this post?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
