@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="card text-white bg-dark my-5" >
        <img class="card-img-top" src="{{ asset ('storage/' . $project->project_image)}}" alt="{{$project->title}}" height="300px">
        <div class="card-body">
            <h4 class="card-title">Title: {{$project->title}}</h4>
            <span class="badge bg-primary">{{$project->type?->name}}</span>
            <p>Description: {{$project->description}}</p>
            <p>
                @if ($project->technologies != null)
                <div class="d-flex align-items-start"><strong class="me-3">Technologies: </strong>
                    <div class="d-flex justify-content-end w-100 align-items-center gap-3">
                        @foreach ($project->technologies as $technology)
                            <div>{{ $technology->name }}</div>
                        @endforeach
                    </div>
                </div>
            @endif
            </p>

            <ul>
                <li>
                    <a href="">{{$project->project_url}}</a>
                </li>
                <li>Source code: 
                    <a href="">{{$project->project_source_code}}</a>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <ul class="d-flex justify-content-around list-unstyled">
                <li>Start: {{$project->start_date}}</li>
                @if ($project->end_date == '')
                    <li>End: <i class="fa-solid fa-spinner fa-spin"></i> </li>
                    @else
                    <li>End: {{$project->end_date}}</li>
                @endif
            </ul>
        </div>
    </div>
</div>


@endsection