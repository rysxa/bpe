@extends('layouts.app')

@section('content')
    @if (\App\Libraries\Role::RoleUserActive())
        <div class="container">
            <x-modal.popup></x-modal.popup>
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
                                        <th>Join Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->m_roles->name }}</td>
                                        <td>{!! \App\Libraries\Utils::u_Date($item->created_at) !!}</td>
                                        <td>{!! \App\Libraries\Status::GetStatus($item->status) !!}</td>
                                        <td>
                                            @if ($item->id != 1 && $item->id != 2 && \App\Libraries\Role::RoleAdmin())
                                                <x-button.edit
                                                    url="{{ route('management.user.edit', ['id' => $item->id]) }}"></x-button.edit>
                                            @endif
                                            @if (\App\Libraries\Role::RoleSuperAdmin())
                                                <x-button.delete id="{{ $item->id }}"
                                                    :url="route('management.user.delete', ['id' => $item->id])"></x-button.delete>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
