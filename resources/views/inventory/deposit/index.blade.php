@extends('layouts.app')

@section('content')
    @if (\App\Libraries\Role::RoleMenuUserActive())  
        <div class="container">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Deposit</h4>
                            <x-button.add :url="route('inventory.deposits.create')" feature="{{ $title }}"></x-button.add>
                            <table class="table table-striped">
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
                                                    url="{{ route('inventory.deposits.show', ['deposit' => $item->id]) }}"></x-button.show>
                                                @if (\App\Libraries\Role::RoleMenuSuperAdmin())  
                                                    <x-button.edit
                                                    url="{{ route('inventory.deposits.edit', $item->id) }}"></x-button.edit>
                                                    <x-button.delete id="{{ $item->id }}" :url="route('inventory.deposits.destroy', ['deposit' => $item->id])"></x-button.delete>
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
