@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">Hello, Admin</p>

<div class="row row-cols-1 row-cols-md-3 g-3">
    <div><a href="units/create" class="btn btn-primary w-100">New Unit</a></div>
    <div><a href="courses/create" class="btn btn-primary w-100">New Course</a></div>
    <div><a href="departments/create" class="btn btn-primary w-100">New Department</a></div>
    <div><a href="schools/create" class="btn btn-primary w-100">New School</a></div>

</div>
@endsection