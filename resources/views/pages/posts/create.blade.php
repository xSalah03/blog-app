@extends('layouts.app')

@section('title')
    Create post
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-shadow rounded-8'>
                        <div class='card-header'>
                            <h4>Create your own post</h4>
                        </div>
                        <div class='card-body'>
                            <form action='{{ route('posts.store') }}' method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='title' class='mb-3'>Title</label>
                                    <input type='text' name='title' id='' value='{{ old('title') }}'
                                        class='form-control @error('title') is-invalid @enderror'>
                                    @error('title')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='description' class='mb-3'>Description</label>
                                    <input type='text' name='description' id='' value='{{ old('description') }}'
                                        class='form-control @error('description') is-invalid @enderror'>
                                    @error('description')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='cover' class='mb-3'>Cover</label>
                                    <input type='file' name='cover' id='' value='{{ old('cover') }}'
                                        class='form-control @error('cover') is-invalid @enderror'>
                                    @error('cover')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for="category_id" class="mb-3">Category</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class='form-group'>
                                    <button class='btn btn-dark w-100'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
