@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-md-6 grid-margin stretch-card justify-content-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit User</h4>
                <form class="forms-sample" method="POST" action="{{ route('management.user.update', ['id' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <input type="text" name="password" value="{{ old('password', $user->password) }}" hidden>
                    <x-form.input name="name" label="Name" valueId="{{ $user->name }}" />
                    <x-form.input name="email" label="Email" type="email" valueId="{{ $user->email }}" />
                    @if ($user->id != 1)
                        <x-form.select name="status" label="Status">
                            <option value="1" {{ $user->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $user->status == '0' ? 'selected' : '' }}>Not Active</option>
                        </x-form.select>
                        <x-form.select name="role" label="Role">
                            @foreach ($role as $items)
                                <option value="{{ $items->id }}" {{ $user->role_id == $items->id ? 'selected' : '' }}>
                                    {{ $items->name }}</option>
                            @endforeach
                        </x-form.select>
                    @else
                        <input type="text" name="role" value="{{ old('role') }}" hidden>
                        <input type="text" name="status" value="{{ old('status') }}" hidden>
                    @endif
                    <x-button.submit />
                </form>
            </div>
        </div>
    </div>
@endsection
