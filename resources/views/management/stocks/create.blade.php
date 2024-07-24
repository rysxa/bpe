@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Stock</h2>
        <form action="{{ route('management.stocks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="qty">Quantity:</label>
                <input type="number" class="form-control" id="qty" name="qty" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
