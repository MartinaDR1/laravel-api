@extends('layouts.admin')

@section('content')

<div class="bg-dark text-light">
    @include('partials.session_message')

    <form action="{{route('admin.projects.update', $project)}}" method="post" class="p-4 my-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title')}}" aria-describedby="titleHelper">

            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value="">Select a type</option>
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id  == old('type_id', '') ? 'selected' : '' }}>{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <p>Seleziona le tecnologie:</p>
            @foreach ($techologies as $technology)
            <div class="form-check @error('technologies') is-invalid @enderror">
                <label class="form-check-label">
                    @if($errors->any())
                    {{-- se ci sono degli errori di validazione
                    signifca che bisogna recuperare i tag selezionati
                    tramite la funzione old(),
                    la quale restituisce un array plain contenente solo gli id --}}
    
                    <input name="technologies[]" type="checkbox" value="{{ $technology->id }}" class="form-check-input" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
    
                    @else
                    {{-- se non sono presenti errori di validazione
                    significa che la pagina è appena stata aperta per la prima volta,
                    perciò bisogna recuperare i tag dalla relazione con il post,
                    che è una collection di oggetti di tipo Tag	--}}
    
                    <input name="technologies[]" type="checkbox" value="{{ $technology->id }}" class="form-check-input" {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                    @endif
    
    
                    {{ $technology->name }}
                </label>
    
            </div>
            @endforeach
            @error('technologies')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" value="{{ old('description') }}"></textarea>

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <div class="row">
                <div class="col-3">
                    <img src="{{$project->project_image}}" alt="" height="100">
                </div>
                <div class="col-9">
                    <label for="project_image" class="form-label">Image</label>
                    <input type="text" class="form-control" name="project_image" id="project_image" value="{{ old('project_image') }}">        
                </div>
            </div>
        </div>
        
        <div class="mb-4">
            <div class="row">
                <div class="col-6">
                    <label for="project_url" class="form-label">Project url</label>
                    <input type="url" class="form-control" name="project_url" id="project_url" value="{{ old('project_url') }}">
                </div>
                <div class="col-6">
                    <label for="project_source_code" class="form-label">Source code</label>
                    <input type="url"class="form-control" name="project_source_code" id="project_source_code" value="{{ old('project_source_code') }}">
                </div>
            </div>

        </div>

        <div class="mb-4">
            <label for="duration" class="form-label d-flex">Duration</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration') }}">
        </div>
    
        <div class="mb-4">
            <div class="row">
                <div class="col-6">
                    <label for="start_date" class="form-label">Start-date</label>
                    <input type="date" class="form-control  @error('start_date') is-invalid @enderror" name="start_date" id="start_date" value="{{ old('start_date') }}">

                    @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="end_date" class="form-label">End-date</label>
                    <input type="date"class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}">
                </div>
            </div>

        </div>

    
        <button type="submit" class="btn btn-light">Update</button>
    
    </form>
</div>


@endsection