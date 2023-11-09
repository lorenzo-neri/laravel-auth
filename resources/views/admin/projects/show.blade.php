@extends('layouts.admin')

@section('content')
    <div class="container">
        <h3>Project {{ $project->id }}</h3>
        <h1>{{ $project->title }}</h1>

        <div>Tech used: {{$project->tech}}</div>

        <p>
            {{ $project->description }}
        </p>
    </div>
@endsection