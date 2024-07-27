@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">$ 150,000</h2>
                    <h6 class="card-text">Increased by 60%</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Stocks <i class="mdi mdi-ambulance mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{ '-' }}</h2>
                    <h6 class="card-text">P3K</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Not Deposited <i class="mdi mdi-money mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">45,6334</h2>
                    <h6 class="card-text">Decreased by 10%</h6>
                </div>
            </div>
        </div>
    </div> --}}
    <x-modal.popup></x-modal.popup>
    <div class="row">
        @foreach ($totalQty as $productName => $data)
            @php
                $quantity = $data[0];
                $icon = $data[1];
            @endphp
        <div class="col-md-2 stretch-card grid-margin">
            @if ($quantity == 0 || $quantity < 0)
                <div class="card bg-gradient-danger card-img-holder">
            @elseif ($quantity <= 200)
                <div class="card bg-gradient-warning card-img-holder">
            @elseif ($quantity > 200)
                <div class="card bg-gradient-success card-img-holder">
            @endif
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{ $productName }} <i class="fa fa-{{ $icon }} mdi-24px float-end"></i>
                    </h4>
                    @if ($quantity < 0)
                        <h2 class="mb-5">{{ $quantity }}</h2>
                        <h6 class="card-text">Minus Stock</h6>
                    @elseif ($quantity == 0)
                        <h2 class="mb-5">{{ $quantity }}</h2>
                        <h6 class="card-text">Empty Stocks</h6>
                    @elseif ($quantity <= 200)
                        <h2 class="mb-5">{{ $quantity }}</h2>
                        <h6 class="card-text">Almost out of Stock</h6>
                    @else
                        <h2 class="mb-5">{{ $quantity }}</h2>
                        <h6 class="card-text">Available Stock</h6>
                    @endif
                    <small>{{ now() }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
