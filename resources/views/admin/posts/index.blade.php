@extends("layouts.app")

@section("title", "Posts Index")

@section('content')
    <div class="container">
        @if (session('message'))
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Title</td>
                        <td>Date</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user }}</td>
                                <td>{{ $post->date }}</td>
                                <td class="d-flex">
                                    <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h2>There are no posts.</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection