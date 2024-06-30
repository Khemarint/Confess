@extends('layout.layout')
@section('title', 'Ideas | Admin Dashboard')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.shared.left-sidebar')
        </div>
        <div class="col-9">
            <h1>Ideas</h1>
            <table class="table table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brains as $brain)
                        <tr>
                            <td>{{ $brain->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $brain->user) }}">
                                    {{ $brain->user->name }}
                                </a>
                            </td>
                            <td>{{ $brain->content }}</td>
                            <td>{{ $brain->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('brain.show', $brain) }}">View</a>
                                <a href="{{ route('brain.edit', $brain) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $brains->links() }}
            </div>
        </div>
    </div>
@endsection
