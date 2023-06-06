@extends('layouts.app')

@section('title')
    Product
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-shadow rounded-8'>
                        <div class='card-header'>
                            <h4>Create your own product</h4>
                        </div>
                        <div class='card-body'>
                            <form action="{{ route('createProduct') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name" class="mb-3">Product name:</label>
                                    <input type="text" name="name" id="" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="price" class="mb-3">Price:</label>
                                    <input type="number" name="price" id="" value="{{ old('price') }}"
                                        class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="quantity" class="mb-3">Quantity:</label>
                                    <input type="number" name="quantity" id="" value="{{ old('quantity') }}"
                                        class="form-control @error('quantity') is-invalid @enderror">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label for="category" class="mb-3">Category:</label>
                                    <select name="category"
                                        class="form-control @error('category') is-invalid @enderror">
                                        <option value="">Select a category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach 
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-dark w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
