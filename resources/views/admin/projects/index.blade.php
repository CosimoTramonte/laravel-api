@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1 class="fs-4 my-4">
        Project List
    </h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <table class="table table-dark table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Kind of Works</th>
            <th scope="col">Type</th>
            <th scope="col">Technologies used</th>
            <th scope="col">Project start date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td>{{$project->name}}</td>
                    <td><span class="badge
                        @if ($project->kind->name == 'Back End')
                            text-bg-primary
                        @elseif ($project->kind->name == 'Front End')
                            text-bg-light
                        @elseif ($project->kind->name == 'Full Stack')
                            text-bg-warning
                        @endif
                        ">{{$project->kind?->name}}</span></td>
                    <td>{{$project->type}}</td>
                    <td>
                        @forelse ($project->technologies as $technology)
                            <span><i class="fa-brands fa-{{ $technology->name }}"></i></span>
                        @empty
                            <span>NO Technologies</span>
                        @endforelse

                    </td>
                    @php
                        $dateOfStart = date_create($project->project_start);
                    @endphp
                    <td>{{ date_format($dateOfStart, 'd/m/Y') }}</td>
                    <td>
                        <a href="{{route('admin.projects.show', $project)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fa-solid fa-pen"></i></a>

                        @include('admin.partials.delete_modal')

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        {{ $projects->links() }}
    </div>

</div>
@endsection
