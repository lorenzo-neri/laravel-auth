@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Edit Project') }} {{ Auth::user()->name }}
        </h2>

        <div class="row justify-content-center my-3">
            <div class="col">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @method('put')

                    <div class="mb-3">

                        <label for="title" class="form-label"><strong>Title</strong></label>

                        <input type="text" class="form-control" name="title" id="title"
                            aria-describedby="helpTitle" placeholder="New project Title"
                            value="{{ old('title') ? old('title') : $project->title }}" required
                            value="{{ old('title') }}">

                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="description" class="form-label"><strong>Description</strong></label>

                        <input type="text" class="form-control" name="description" id="description"
                            aria-describedby="helpTitle" placeholder="New project Description">

                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="tech" class="form-label"><strong>Technologies Used</strong></label>

                        <input type="text" class="form-control" name="tech" id="tech"
                            aria-describedby="helpTitle" placeholder="Tech used creating the New Project">

                        @error('tech')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label for="thumb" class="form-label"><strong>Choose a Thumbnail image file</strong></label>

                        <input type="file" class="form-control" name="thumb" id="thumb"
                            placeholder="Upload a new image file..." aria-describedby="fileHelpThumb">

                        @error('thumb')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label for="github_link" class="form-label"><strong>Link GitHub</strong></label>

                        <input type="url" class="form-control" name="github_link" id="github_link"
                            aria-describedby="helpGithubLink" placeholder="GitHub link to the New Project" required
                            value="{{ old('github_link') }}">

                        @error('github_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="web_link" class="form-label"><strong>Link WEB</strong></label>

                        <input type="url" class="form-control" name="web_link" id="web_link"
                            aria-describedby="helpWebLink" placeholder="Web link to the New Project" required
                            value="{{ old('web_link') }}">

                        @error('web_link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success my-3">SAVE</button>
                    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">CANCEL</a>


                </form>
            </div>
        </div>

    </div>
@endsection
