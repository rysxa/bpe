@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $title }}</h4>
                        <x-button.add :url="route('management.products.create')" feature="{{ $title }}"></x-button.add>
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
                                                url="{{ route('management.products.show', ['product' => $item->id]) }}"></x-button.show>
                                            <x-button.edit
                                                url="{{ route('management.products.edit', $item->id) }}"></x-button.edit>
                                            <x-button.delete id="{{ $item->id }}" :url="route('management.products.destroy', ['product' => $item->id])"></x-button.delete>
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