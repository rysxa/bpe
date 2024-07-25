@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <h2>Stock Inventory</h2>
        <a href="{{ route('inventory.deposits.create') }}" class="btn btn-primary mb-3">Add Stock</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th width="280px"></th>
            </tr>

            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->price }}</td>
                    <td>
                        <form action="{{ route('inventory.deposits.destroy', $stock->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('inventory.deposits.show', $stock->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('inventory.deposits.edit', $stock->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deposit</h4>
                        <a href="{{ route('inventory.deposits.create') }}" class="btn btn-gradient-primary me-2">Add
                            Deposit</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th width="280px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{!! \App\Libraries\Utils::u_Price($item->price) !!}</td>
                                        <td>
                                            <x-button.show
                                                url="{{ route('inventory.deposits.show', ['deposit' => $item->id]) }}"></x-button.show>
                                            <x-button.edit
                                                url="{{ route('inventory.deposits.edit', $item->id) }}"></x-button.edit>
                                            <x-button.delete id="{{ $item->id }}" :url="route('inventory.deposits.destroy', ['deposit' => $item->id])"></x-button.delete>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
