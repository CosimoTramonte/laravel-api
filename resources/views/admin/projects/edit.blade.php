@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1 class="fs-4 my-4">
        Edit New Project
    </h1>

    @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif


    <form action="{{route('admin.projects.update', $project)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label text-white">Name of Project</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{ old('name', $project->name)}}"
                placeholder="Name"
            >
        </div>

        <div class="mb-3">
            <label for="kind_id" class="form-label text-white">Kind of Works</label>
            <select class="form-select" aria-label="Default select example" name="kind_id">
                <option>Selects a Kind of Works</option>
                @foreach ($kinds as $kind)
                    <option
                    value="{{ $kind->id }}"
                    @if ($kind->id == old('kind_id',$project->kind?->id))
                        selected
                    @endif
                    >{{ $kind->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label text-white">Type of Project</label>
            <input
                type="text"
                class="form-control @error('type') is-invalid @enderror"
                id="type"
                name="type"
                value="{{ old('type', $project->type)}}"
                placeholder="Type"
            >
        </div>

        <div class="mb-3">
            <p class="form-label text-white">Technologies used</p>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                @foreach ($technologies as $technology)
                    <input
                        type="checkbox"
                        class="btn-check"
                        id="technology{{$loop->iteration}}"
                        value="{{$technology->id}}"
                        name="technologies[]"
                        autocomplete="off"
                        @if (!$errors->any() && $project->technologies->contains($technology))
                            checked
                        @elseif ($errors->any() && in_array($technology->id, old('technologies', [])))
                            checked
                        @endif
                        >
                    <label class="btn btn-outline-primary" for="technology{{$loop->iteration}}">{{ $technology->name }}</label>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label text-white">Select an Image</label>
            <input
                class="form-control"
                onchange="showImg(event)"
                type="file"
                id="image"
                name="image">
            <img class="py-3" src="{{ asset('storage/' . $project->image_path) }}" id="img-show" alt="" width="200">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label text-white">Description of Project</label>
            <textarea
                class="form-control @error('description') is-invalid @enderror"
                placeholder="Description"
                name="description"
                id="description"
                cols="30"
                rows="10">{{ old('description', $project->description)}}</textarea>
        </div>

        <div class="mb-3">
            <label for="project_start" class="form-label text-white">Project start date</label>
            <input
                type="text"
                class="form-control @error('project_start') is-invalid @enderror"
                id="project_start"
                name="project_start"
                value="{{ old('project_start', $project->project_start)}}"
                placeholder="es.  YYYY/mm/dd"
            >
        </div>

        <div class="mb-3">
            <label for="end_of_project" class="form-label text-white">Project end date</label>
            <input
                type="text"
                class="form-control @error('end_of_project') is-invalid @enderror"
                id="end_of_project"
                name="end_of_project"
                value="{{ old('end_of_project', $project->end_of_project)}}"
                placeholder="es.  YYYY/mm/dd"
            >
        </div>


        <div class="mb-3">
            <label for="number_of_collaborators" class="form-label text-white">Numbers of Collaborators</label>
            <input
                type="number"
                class="form-control @error('number_of_collaborators') is-invalid @enderror"
                id="number_of_collaborators"
                name="number_of_collaborators"
                value="{{ old('number_of_collaborators', $project->number_of_collaborators)}}"
                placeholder="Number of collaborators"
            >
        </div>

        <button type="submit" class="btn btn-primary">Update</button>

    </form>


</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
    } );

    function showImg(event){
        const tagImg = document.getElementById('img-show');
        tagImg.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
