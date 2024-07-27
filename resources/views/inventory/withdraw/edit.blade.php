@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('inventory.withdraws.update', $stock->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <x-form.read name="name" label="Name" valueId="{{ $stock->m_user->name }}" />
                        <x-form.select name="product" label="Product">
                            @foreach ($product as $items)
                                <option value="{{ $items->id }}" {{ $stock->product_id == $items->id ? 'selected' : '' }}>
                                    {{ $items->name }}</option>
                            @endforeach
                        </x-form.select>
                        <x-form.input name="qty" label="Quantity" valueId="{{ $stock->qty }}" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
