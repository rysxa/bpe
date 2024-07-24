@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Stock</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Deposit</h4>
                    <form class="forms-sample" method="POST" action="{{ route('management.stocks.update', $stock->id) }}">
                        @csrf
                        @method('PUT')

                        <x-form.input name="name" label="Name" valueId="{{ $stock->name }}" />
                        <x-form.input name="qty" label="Quantity" valueId="{{ $stock->qty }}" />
                        <x-form.input name="price" label="Price" valueId="{{ $stock->price }}" />

                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
