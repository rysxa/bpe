@extends('layouts.app')

@section('content')
    @if (\App\Libraries\Role::RoleUserActive())
        <div class="container">
            <x-modal.popup></x-modal.popup>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $title }}</h4>
                            <x-button.add :url="route('inventory.withdraws.create')" feature="{{ $title }}"></x-button.add>
                            <table id="withdrawTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th width="280px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $item)
                                        <tr>
                                            <td>{{ $item->m_user->name }}</td>
                                            <td>{{ $item->m_product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{!! \App\Libraries\Utils::u_Price($item->m_product->deposit_price) !!}</td>
                                            <td>
                                                <x-button.show
                                                    url="{{ route('inventory.withdraws.show', ['withdraw' => $item->id]) }}"></x-button.show>
                                                @if (\App\Libraries\Role::RoleAdmin())
                                                    <x-button.edit
                                                        url="{{ route('inventory.withdraws.edit', $item->id) }}"></x-button.edit>
                                                    <x-button.delete id="{{ $item->id }}"
                                                        url="{{ route('inventory.withdraws.destroy', ['withdraw' => $item->id]) }}"></x-button.delete>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@endpush
