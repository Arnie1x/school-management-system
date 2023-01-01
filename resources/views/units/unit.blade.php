@extends('layout/layout')

@section('content')
    <!-- Unit -->
    <div class="d-flex flex-row justify-content-between align-items-end">
      <p class="display-4 mt-3 text-primary">{{$unit['name']}}</p>
      <div><a href="/units/{{$unit['id']}}/create" class="btn btn-primary me-2 mb-4">New Activity</a></div>
    </div>
    <p>{{$unit['description']}}</p>

    <!-- Unit Activity -->
    <div class="row g-3">
      @foreach ($activities as $activity) 
        <a href="/units/{{$unit['id']}}/{{$activity['id']}}" class="card">
            <div class="card-body">
              <p class="card-title fw-bold">{{$activity['title']}}</p>
              <p class="card-subtitle text-muted">{{$activity['created_at']}}</p>
              <p class="card-text text-black mt-1">{{$activity['description']}}</p>
            </div>
          </a>
      @endforeach
    </div>
    <!-- /Unit Activity -->

    <!-- /Unit -->
@endsection