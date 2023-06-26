@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1 class="fs-4 my-4">
        {{$project->name}}
        <span class="badge
            @if ($project->kind->name == 'Back End')
                text-bg-primary
            @elseif ($project->kind->name == 'Front End')
                text-bg-light
            @elseif ($project->kind->name == 'Full Stack')
                text-bg-warning
            @endif
        ">{{$project->kind?->name}}</span>
        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

        @include('admin.partials.delete_modal')
    </h1>

    <div class="w-100">
        @if ($project->image_path)
            <img class="w-50" src="{{ asset('storage/' . $project->image_path) }}" alt="{{$project->name}}">
        @else
            <img class="w-50" src="/img/no-img.jpg" alt="{{$project->name}}">
        @endif
    </div>

    <div>
        <h3 class="py-4">Type -> {{$project->type}}</h3>
        <h4 class="py-4">Technologies used:
            @forelse ($project->technologies as $technology)
                <span><i class="fa-brands fa-{{ $technology->name }}"></i></span>
            @empty
                <span>no technology</span>
            @endforelse
        </h4>
        <h6 class="d-inline py-4">Description: </h6>
        <div class="text-white">
            <p>{!! $project->description !!}</p>
        </div>
        <span class="text-white">Numbers of Collaborators: {{$project->number_of_collaborators}} |</span>
        <span class="text-white">Project start date: {{$project->dateOfStart_formatted}} |</span>
        <span class="text-white">Project end date: {{$project->dateOfFinish_formatted}} |</span>
    </div>


</div>
@endsection
