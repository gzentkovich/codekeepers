@extends('layouts.admin')

@section('content')
    <h2 class="clearfix">
        Edit User&apos;s Details
        <span class="float-right">
            <a href="{{ route('users.index') }}">
                <i class="fa  fa-arrow-left text-primary icon-set"></i>
            </a>
        </span>
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Uh-oh!</strong> There were some problems with your input.

            <ul class="mt-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <div class="col-md-6">
                <label for="name">Name (Full Name)</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="fullname">
            </div>
            <div class="col-md-6">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email-address">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label for="role">Role</label>
                <select name="role_id" class="form-control">
                    <!-- @for ($i = 1; $i <= 3; $i++)
                        <option value="{{ $i }}" @if($i==$user->role_id) selected='selected' @endif>{{ $rolenames[$i] }}</option>
                    @endfor -->
                    @foreach ($rolenames as $id => $name)
                        <option value="{{ $id }}" @if($id==$user->role_id) selected='selected' @endif>{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="is_active">Active?</label>
                <select name="is_active" class="form-control">
                    @for ($i = 0; $i < 2; $i++)
                        <option value="{{ $i }}" @if($i==$user->is_active) selected='selected' @endif>{{ $activenames[$i] }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </div>
    </form>
@endsection
