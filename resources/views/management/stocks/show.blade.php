@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Show Stock</h2>
        <div class="form-group">
            <strong>Name:</strong>
            {{ $stock->name }}
        </div>
        <div class="form-group">
            <strong>Quantity:</strong>
            {{ $stock->qty }}
        </div>
        <div class="form-group">
            <strong>Price:</strong>
            {{ $stock->price }}
        </div>
        <a class="btn btn-primary" href="{{ route('management.stocks.index') }}">Back</a>
    </div>
@endsection
