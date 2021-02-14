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

        <div>
        <h1 class="display-4">Проверки</h1>
        </div>

        <br>
            <div>
            <form action="{{ route('domains.checks.store', $domain->id) }}" method="post">
            @csrf
            <button class="btn btn-outline-dark" type="submit">Проверить этот сайт сейчас</button>
            </form>
            </div>
        <br><br>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Код ответа</th>
                    <th>h1</th>
                    <th>keywords</th>
                    <th>description</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checks as $check)
                    <tr>
                        <th scope="row">{{ $check->id }}</th>
                        <td>{{ $check->status_code }}</td>
                        <td>{{ $check->h1 }}</td>
                        <td>{{ $check->keywords }}</td>
                        <td>{{ $check->description }}</td>
                        <td>{{ $check->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>
    </div>

@endsection