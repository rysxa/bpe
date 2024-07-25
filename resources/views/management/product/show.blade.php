@extends('layouts.app')
@section('content')
    <div class="container">
        <h2><i class="fa fa-plus fa-2x text-success"></i> {{ $title }} Form</h2>
        <div class="col-md-6 card bg-gradient-danger card-img-holder text-white justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <x-form.read name="name" label="Create Date" valueId="{!! \App\Libraries\Utils::u_DateTime($stock->created_at) !!}" />
                        <x-form.read name="name" label="Name" valueId="{{ $stock->name }}" />
                        <x-form.read name="capital_price" label="EMS Price" valueId="{!! \App\Libraries\Utils::u_Price($stock->capital_price) !!}" />
                        <x-form.read name="deposit_price" label="Clinic Price" valueId="{!! \App\Libraries\Utils::u_Price($stock->deposit_price) !!}" />
                        <x-form.read name="sales_price" label="Sales Price" valueId="{!! \App\Libraries\Utils::u_Price($stock->sales_price) !!}" />
                        <x-form.read name="icon" label="Icon" valueId="{!! \App\Libraries\Utils::u_Price($stock->icon) !!}" />
                        <x-button.back url="{{ route('management.products.index') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
