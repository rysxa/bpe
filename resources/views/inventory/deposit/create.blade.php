@extends('layouts.app')

@section('content')
    <div class="col-md-6 grid-margin stretch-card justify-content-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Deposit</h4>
                <form class="forms-sample" method="POST" action="{{ route('inventory.deposits.store') }}">
                    @csrf

                    <x-form.input name="name" label="Name" valueId="" />
                    <x-form.input name="qty" label="Quantity" valueId="" />
                    <x-form.input name="price" label="Price" valueId="" />

                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
