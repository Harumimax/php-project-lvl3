@extends('layouts.app')

@section('content')

  <div class="container-lg">
    <div>
    <h1 class="display-4">Page Analizer</h1>
    <p class="lead">Please enter url you wont to analize</p>
        
    @if ($errors->any())
      <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li><p class="text-danger">{{ $error }}</p></li>
            @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('domains.store') }}" method="post" class="d-flex justify-content-center">
    @csrf
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="domain[name]" class="form-control mb-3" placeholder="https://www.example.com">
        <button class="btn btn-outline-secondary" type="submit">Check</button>
      </div>

    </form>
  </div>

@endsection