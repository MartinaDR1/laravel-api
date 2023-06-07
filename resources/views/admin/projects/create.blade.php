@extends('layouts.admin')

@section('content')

<div class="bg-dark text-light">
    @include('partials.session_message')

    <form action="{{route('admin.projects.store')}}" method="post" class="p-4 my-4">
        @csrf
    
        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="titleHelper">
        
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

        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>

            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="mb-4">
            <label for="duration" class="form-label d-flex">Duration</label>
            <input type="number" name="duration" id="duration">
        </div>
    
        <div class="mb-4">
            <div class="row">
                <div class="col-6">
                    <label for="start_date" class="form-label">Start-date</label>
                    <input type="date" class="form-control  @error('start_date') is-invalid @enderror" name="start_date" id="start_date">

                    @error('start_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="end_date" class="form-label">End-date</label>
                    <input type="date"class="form-control" name="end_date" id="end_date">
                </div>
            </div>

        </div>

    
        <button type="submit" class="btn btn-light">Save</button>
    
    </form>
</div>


@endsection