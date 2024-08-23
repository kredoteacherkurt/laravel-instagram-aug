@extends('layouts.app')

@section('title', 'Users|ADMIN')


@section('content')
    <table class=" table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <tr>
                <th></th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_users as $user)
                <tr>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        @if ($user->trashed())
                            <i class="fa-solid fa-circle text-danger"></i>
                        @else
                            <i class="fa-solid fa-circle text-success"></i>
                        @endif
                    </td>
                    <td>
                        @if (Auth::user()->id != $user->id)
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                <div class="dropdown-menu">
                                    @if ($user->trashed())
                                        <button class="dropdown-item text-success" data-bs-toggle="modal"
                                            data-bs-target="#activate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-check"></i> Activate {{ $user->name }}
                                        </button>
                                    @else
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#deactivate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate {{ $user->name }}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </td>
                    @include('admin.users.modals.status')
            @endforeach
        </tbody>
    </table>
@endsection
