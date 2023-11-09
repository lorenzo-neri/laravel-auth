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
                                @if (str_contains($project->thumb, 'http'))
                                    <img width="100" src="{{ $project->thumb }}" alt="{{ $project->title }}">
                                @else
                                    <img width="100" src="{{ asset('storage/' . $project->thumb) }}">
                                @endif
                            </td>
                            <td class="align-middle">{{ $project->title }}</td>
                            <td class="align-middle">{{ $project->description }}</td>
                            <td class="align-middle">{{ $project->tech }}</td>
                            <td class="align-middle">
                                <a class="btn btn-secondary" href="{{ route('admin.projects.show', $project->slug) }}">show</a>
                            </td>
                            <td class="align-middle">
                                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">edit</a>
                            </td>
                            <td class="align-middle">
                                {{-- <a class="btn btn-danger" href="{{ route('admin.projects.destroy', $project) }}">Delete</a> --}}


                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$project->id}}">
                                    Delete
                                </button>
                                
                                <div class="modal fade" id="modalId-{{$project->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalId-{{$project->id}}" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId-{{$project->id}}">Modal title id: {{$project->id}}</h5>
                                      </div>
                                      <div class="modal-body">
                                        Attenzione! Sicuro di voler eliminare?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal">
                                            annulla &times;
                                        </button>
                                        {{-- non confondere destroy con delete --}}
                                        <form action="{{route ('admin.projects.destroy', $project->slug)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td class="align-middle">No Projects to show</td>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection