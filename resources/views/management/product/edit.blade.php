@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('management.products.update', $stock->id) }}">
                        @csrf
                        @method('PUT')

                        <x-form.input name="name" label="Name" valueId="{{ $stock->name }}" />
                        <x-form.input name="capital_price" label="EMS Price" valueId="{{ $stock->capital_price }}" />
                        <x-form.input name="deposit_price" label="Clinic Price" valueId="{{ $stock->deposit_price }}" />
                        <x-form.input name="sales_price" label="Sales Price" valueId="{{ $stock->sales_price }}" />
                        <x-form.input name="icon" label="Icon" valueId="{{ $stock->icon }}" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
