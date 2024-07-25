@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('management.products.store') }}">
                        @csrf

                        <x-form.input name="name" label="Name" valueId="" />
                        <x-form.input name="capital_price" label="EMS Price" valueId="" />
                        <x-form.input name="deposit_price" label="Deposit Price" valueId="" />
                        <x-form.input name="sales_price" label="Sales Price" valueId="" />
                        <x-form.input name="icon" label="Icon" valueId="" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
