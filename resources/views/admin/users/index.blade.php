@extends('layouts.admin')

@section('content')

    <h2 class="clearfix">
        User&apos;s Admin 
    </h2>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
                                
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{ ++$i }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->role['name'] }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->is_active ? 'Active' : 'Inactive' }}
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('users.show', $user->id) }}">
                        <i class="fa fa-search text-primary img-spacer-10"></i>
                    </a>
                    <a href="{{ route('users.edit', $user->id) }}">
                        <i class="fa fa-pencil text-success img-spacer-10"></i>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="outline: none; border: 0; border-color:none;background-color:transparent;">
                        <i class="fa fa-trash text-danger"></i>
                    </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection