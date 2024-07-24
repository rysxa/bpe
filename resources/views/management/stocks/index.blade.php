@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Stock Inventory</h2>
        <a href="{{ route('management.stocks.create') }}" class="btn btn-primary mb-3">Add Stock</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th width="280px"></th>
            </tr>
            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->price }}</td>
                    <td>
                        <form action="{{ route('management.stocks.destroy', $stock->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('management.stocks.show', $stock->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('management.stocks.edit', $stock->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
