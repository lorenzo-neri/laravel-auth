@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Project List for') }} {{ Auth::user()->name }}
        </h2>

        <a class="btn btn-primary mb-4" href="{{ route('admin.projects.create') }}">Add Project</a>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Technologies used</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr class="">
                            <td class="align-middle" scope="row">{{ $project->id }}</td>
                            <td class="text-center align-middle">
                                <img width="100" src="{{ $project->thumb }}" alt="">    
                            </td>
                            <td class="align-middle">{{ $project->title }}</td>
                            <td class="align-middle">{{ $project->description }}</td>
                            <td class="align-middle">{{ $project->tech }}</td>
                            <td><a class="btn btn-secondary" href="{{ route('admin.projects.show', $project->id) }}">show</a></td>
                        </tr>
                    @empty
                        <td class="align-middle">No Projects to show</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection