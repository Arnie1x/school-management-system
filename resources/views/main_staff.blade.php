@extends('layout/layout')

@section('content')

<p class="display-4 mt-3 text-primary">{{$department['name']}}</p>
<p>{{$department['description']}}</p>
              
<div class="row row-cols-1 g-3">
  @foreach ($activities as $activity)
  <a href="#activity" class="col">
    <div class="card">
      <div class="card-body">
        <p class="card-title">{{$activity['title']}}</p>
        <p class="card-subtitle text-black">John Doe (Author) {{$activity['author']}}</p>
        <p class="card-text text-muted mt-2">{{$activity['description']}}</p>
        <small class="text-black">{{$activity['created_at']}}</small>
      </div>
    </div>
  </a>
  @endforeach
    
</div>
@endsection