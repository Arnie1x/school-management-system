@extends('layout/layout')

@section('content')
    <!-- Unit -->
    <p class="display-4 mt-3 text-primary">{{$unit['name']}}</p>
    <p>{{$unit['description']}}</p>

    <!-- Unit Activity -->
    <div class="row g-3">
      @foreach ($activities as $activity) 
        <a href="/units/{{$unit['id']}}/{{$activity['id']}}" class="card">
            <div class="card-body">
              <p class="card-title fw-bold">{{$activity['name']}}</p>
              <p class="card-subtitle text-muted">{{$activity['created_at']}}</p>
              <p class="card-text text-black mt-1">{{$activity['description']}}</p>
            </div>
          </a>
      @endforeach
    </div>
    <!-- /Unit Activity -->

    <!-- /Unit -->
@endsection