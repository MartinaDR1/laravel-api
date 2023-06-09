@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="fs-4 text-secondary my-4">
        {{ __('Hello ' . Auth::user()->name) }}
    </h1>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Welcome to your dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-md-3 row-cols-sm-1 my-5 d-flex justify-content-around">
        <div class="card_projects shadow w-25 text-center p-5">
            <a class="nav-link text-dark" href="{{route('admin.projects.index')}}">
                <strong>
                    {{__('Projects')}}
                </strong>
            </a>
        </div>
        <div class="card_types shadow w-25 text-center p-5">
            <a class="nav-link text-dark" href="{{route('admin.types.index')}}">
                <strong>
                    {{__('Types')}}
                </strong>
            </a>
        </div>
        <div class="card_technologies shadow w-25 text-center p-5">
            <a class="nav-link text-dark" href="{{route('admin.technologies.index')}}">
                <strong>
                    {{__('Technologies')}}
                </strong>
            </a>
        </div>
    </div>
</div>
@endsection