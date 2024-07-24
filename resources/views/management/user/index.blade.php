@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

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
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->m_roles->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{!! \App\Libraries\Status::GetStatus($item->status) !!}</td>
                                        <td>
                                            <a href="{{ route('management.user.edit', ['id' => $item->id]) }}"
                                                class="btn icon-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
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
                                                    Apakah Anda yakin ingin menghapus user ini?
                                                </div>
                                                <div class="modal-footer" style="border: none;">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <a href="{{ route('management.user.delete', ['id' => $item->id]) }}"
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
