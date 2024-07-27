@extends('layouts.app')

@section('content')
    @if (\App\Libraries\Role::RoleMenuUserActive())  
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
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
                                                @if (\App\Libraries\Role::RoleMenuSuperAdmin())  
                                                    <x-button.edit
                                                    url="{{ route('inventory.withdraws.edit', $item->id) }}"></x-button.edit>
                                                    <x-button.delete id="{{ $item->id }}" url="{{ route('inventory.withdraws.destroy', ['withdraw' => $item->id]) }}"></x-button.delete>
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#withdrawTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('inventory.withdraws.index') }}",
            columns: [
                { data: 'm_user.name', name: 'm_user.name' },
                { data: 'm_product.name', name: 'm_product.name' },
                { data: 'qty', name: 'qty' },
                { 
                    data: 'm_product.deposit_price', 
                    name: 'm_product.deposit_price',
                    render: function(data) {
                        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data);
                    }
                },
                {
                    data: 'id',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return `
                            <x-button.show url="${route('inventory.withdraws.show', data)}"></x-button.show>
                            <x-button.edit url="${route('inventory.withdraws.edit', data)}"></x-button.edit>
                            <x-button.delete id="${data}" url="${route('inventory.withdraws.destroy', data)}"></x-button.delete>
                        `;
                    }
                }
            ]
        });
    });
</script>
@endpush