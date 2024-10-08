@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <h2>Create {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('inventory.withdraws.store') }}">
                        @csrf

                        <x-form.select name="product" label="Product">
                            @foreach ($product as $item)
                                <option value="{{ old('product', $item->id) }}"
                                    {{ old('product') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </x-form.select>
                        <x-form.input name="qty" label="Quantity" valueId="" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
