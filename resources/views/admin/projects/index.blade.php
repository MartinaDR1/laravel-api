@extends('layouts.admin')

@section('content')

@include('partials.session_message')

<div class="d-flex justify-content-between my-3">
    <h1>Projects table</h1>
    <a name="" id="add" class="d-flex justify-content-center align-self-center p-3 rounded-circle text-decoration-none text-dark" href="{{route('admin.projects.create')}}" role="button"><i class="fa-solid fa-plus"></i></a>
</div>

<div class="table-responsive">
    <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">

            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Start-date</th>
                <th>End-date</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">


            @forelse ($projects as $project)
            <tr class="table-dark">
                <td scope="row">{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>
                    <img src="{{ asset('storage/' . $project->project_image) }}" alt="{{$project->title}}" height="80">
                </td>

                <td>{{$project->description}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>

                <td>
                    <a class="text-decoration-none text-success" href="{{route('admin.projects.show', $project)}}" role="button"><i class="fas fa-eye fa-sm fa-fw"></i></a>
                    <a class="text-decoration-none text-warning" href="{{route('admin.projects.edit', $project)}}" role="button"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                    
                    @include('partials.modal_delete')
                </td>

            </tr>
            @empty
            <tr class="table-primary">
                <td scope="row">No projects yet.</td>

            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center py-3">
        {{ $projects->links() }}
    </div>
</div>


@endsection