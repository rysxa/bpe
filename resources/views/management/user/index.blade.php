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
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->m_roles->name }}</td>
                                        <td>{!! \App\Libraries\Utils::u_Date($item->created_at) !!}</td>
                                        <td>{!! \App\Libraries\Status::GetStatus($item->status) !!}</td>
                                        <td>
                                            <x-button.edit
                                                url="{{ route('management.user.edit', ['id' => $item->id]) }}"></x-button.edit>
                                            <x-button.delete id="{{ $item->id }}" :url="route('management.user.delete', ['id' => $item->id])"></x-button.delete>
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
@endsection
