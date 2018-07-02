@extends('layouts.admin')

@section('content')
    <h2 class="clearfix">
        User Details
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

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header-top bg-dark text-secondary">
                    <h3>
                        {{ $user->name }}
                    </h3>
                </div>
                <div class="card-body">
                    @if ($user->is_active)
                        <span class="badge badge-success float-right">Active</span>
                    @else
                        <span class="badge badge-secondary float-right">Inactive</span>
                    @endif
                    <p class="card-text">
                        Email: {{ $user->email }}<br />
                        Role:
                        <span class="text-primary font-weight-bold">
                            {{ $user->role->name }}
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary text-muted">Edit Details</a>
                </div>
            </div>
        </div>
    </div>
@endsection