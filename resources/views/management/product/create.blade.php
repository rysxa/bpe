@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create {{ $title }}</h2>
        <div class="col-md-6 grid-margin stretch-card justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('inventory.withdraws.store') }}">
                        @csrf

                        <x-form.input name="name" label="Name" valueId="" />
                        <x-form.input name="qty" label="Quantity" valueId="" />
                        <x-form.input name="price" label="Price" valueId="" />
                        <x-button.submit />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection