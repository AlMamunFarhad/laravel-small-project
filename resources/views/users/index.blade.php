@extends('layouts.master')

@section('title')
    Users Index
@endsection

@section('content')
    <div class="mt-5">
        <div class="row card p-4" style="border-radius: 0; width: 100%">
            <h1 class="text-center">Users</h1>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                        {{--                    <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>--}}
                        <td><a href="{{route('users.show', $user->id)}}" class="btn btn-success">Edit</a></td>

                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        console.log('Hello Users');
    </script>
@endsection
