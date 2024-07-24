@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <h2>Stock Inventory</h2>
        <a href="{{ route('inventory.deposits.create') }}" class="btn btn-primary mb-3">Add Stock</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th width="280px"></th>
            </tr>

            @foreach ($stocks as $stock)
                <tr>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->price }}</td>
                    <td>
                        <form action="{{ route('inventory.deposits.destroy', $stock->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('inventory.deposits.show', $stock->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('inventory.deposits.edit', $stock->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Users</h4>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Join Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ route('inventory.deposits.edit', ['id' => $item->id]) }}"
                                                class="btn icon-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-info"
                                                href="{{ route('inventory.deposits.show', $stock->id) }}">Show</a>
                                            <button type="button" class="btn icon-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $item->id }}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header" style="border: none;">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer" style="border: none;">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <a href="{{ route('inventory.deposits.delete', ['id' => $item->id]) }}"
                                                        class="btn btn-gradient-primary me-2">Ya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
