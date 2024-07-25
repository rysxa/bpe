@extends('layouts.app')
@section('content')
    <div class="container">
        <h2><i class="fa fa-hand-o-down fa-2x text-success"></i> {{ $title }} Form</h2>
        <div class="col-md-6 card bg-gradient-danger card-img-holder text-white justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample">
                        <x-form.read name="name" label="Create Date" valueId="{!! \App\Libraries\Utils::u_DateTime($stock->created_at) !!}" />
                        <x-form.read name="name" label="Name" valueId="{{ $stock->m_user->name }}" />
                        <x-form.read name="product" label="Product" valueId="{{ $stock->m_product->name }}" />
                        <x-form.read name="qty" label="Quantity" valueId="{{ $stock->qty }}" />
                        <x-form.read name="price" label="Price" valueId="{!! \App\Libraries\Utils::u_Price($stock->m_product->deposit_price) !!}" />
                        <x-button.back url="{{ route('inventory.withdraws.index') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
