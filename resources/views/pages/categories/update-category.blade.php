@extends('layouts.app')

@section('title')
    Update Category
@endsection

@section('content')
    <div class='container mt-5'>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card rounded-0 shadow">
                    <div class="card-header">
                        <h5>Update Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateCategory', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $category->name }}">
                                @error('name')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                            <button class='btn btn-dark mt-2'>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
