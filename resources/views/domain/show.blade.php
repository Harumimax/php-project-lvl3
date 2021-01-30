@extends('layouts.app')


<!--
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->


@section('content')
    <div class="container">
        <div>
        <h1 class="display-4">Site: {{ $domain->name }}</h1>
        </div>
        
        <table class="table table-hover table-bordered">
            <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">{{ $domain->id }}</th>
                    </tr>
                    <tr>
                        <th scope="row">NAME</th>
                        <td>{{ $domain->name }}</td>
                    </tr>
                    <tr>
                        <td>created_at</td>
                        <td>{{ $domain->created_at }}</td>
                    </tr>
                    <tr>
                        <td>updated_at</td>
                        <td>{{ $domain->updated_at }}</td>
                    </tr>
            </tbody>
        </table> 
        <br>
    </div>

@endsection