@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('inventory.deposits.update', $stock->id) }}">
                        @csrf
                        @method('PUT')

                        <x-form.input name="name" label="Name" valueId="{{ $stock->name }}" />
                        <x-form.input name="qty" label="Quantity" valueId="{{ $stock->qty }}" />
                        <x-form.input name="price" label="Price" valueId="{{ $stock->price }}" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
