@extends('layouts.app')
@section('content')
    <div class="container">
        <h2><i class="fa fa-truck fa-2x text-success"></i> {{ $title }} Form</h2>
        <div class="col-md-6 card bg-gradient-success card-img-holder text-white justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <x-form.read name="name" label="Create Date" valueId="{!! \App\Libraries\Utils::u_DateTime($stock->created_at) !!}" />
                        <x-form.read name="name" label="Name" valueId="{{ $stock->name }}" />
                        <x-form.read name="qty" label="Quantity" valueId="{{ $stock->qty }}" />
                        <x-form.read name="price" label="Price" valueId="{!! \App\Libraries\Utils::u_Price($stock->price) !!}" />
                        <x-button.back />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
