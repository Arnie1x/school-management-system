@extends('layout/layout')

@section('content')
    
<p class="display-4 mt-3 text-primary">Courses</p>
              
<div class="row row-cols-1 row-cols-md-3 g-3 p-0">
  <a href="#course" class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Course 1</p>
        <p class="card-text fw-light text-black">Lecturer Name</p>
        <p class="card-subtitle text-muted">Course Description. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
      </div>
    </div>
  </a>
  <a href="#course" class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-title">Course 2</p>
        <p class="card-text fw-light text-black">Lecturer Name</p>
        <p class="card-subtitle text-muted">Course Description. Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
      </div>
    </div>
  </a>

@endsection