@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Withdraw</h4>
                        <a href="{{ route('inventory.withdraws.create') }}" class="btn btn-gradient-primary me-2">Add
                            Withdraw</a>
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
                                                url="{{ route('inventory.withdraws.show', ['deposit' => $item->id]) }}"></x-button.show>
                                            <x-button.edit
                                                url="{{ route('inventory.withdraws.edit', $item->id) }}"></x-button.edit>
                                            <x-button.delete id="{{ $item->id }}" :url="route('inventory.withdraws.destroy', ['deposit' => $item->id])"></x-button.delete>
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
