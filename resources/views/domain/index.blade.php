@extends('layouts.app')

@section('content')

    <div class="container">
        <div>
        <h1 class="display-4">Domains</h1>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Last Check</th>
                <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($domains as $domain)
                    <tr>
                        <th scope="row">{{ $domain->id }}</th>
                        <td><a href="{{ route('domains.show', $domain->id) }}" class="link-secondary">{{ $domain->name }}</a></td>
                        <td>{{ $domain->updated_at }}</td>
                        <td>Status</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <br>
    </div>

@endsection