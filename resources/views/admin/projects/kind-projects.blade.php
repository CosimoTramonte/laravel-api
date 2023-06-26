@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h1 class="fs-4 my-4">
        Kind of Wokr list of Project
    </h1>

    <table class="table table-dark table-striped table-hover">

        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Number of Projects</th>
                <th scope="col">Projects</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kinds as $kind)
                <tr>
                    <td>{{$kind->name}}</td>
                    <td>{{count($kind->projects)}}</td>
                    <td>
                        <ul>
                            @forelse ($kind->projects as $project)
                                <li><a class="text-white" href="{{route('admin.projects.show', $project)}}">{{$project->name}}</a></li>
                            @empty
                                <li>Non sono presenti Projects</li>
                            @endforelse
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>


</div>
@endsection

