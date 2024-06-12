@extends('layouts.master')

@section('title')
    Update User
@endsection

@section('content')
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-6">
            <h1 class="pb-3 text-center">Update user</h1>
            <form class="card p-4 bg-light" method="post" action="{{route('users.update', $user->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" id="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback" id="name">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="email">
                    @error('email')
                    <div class="invalid-feedback" id="email">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" id="password" value="{{$user->password}}" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" aria-describedby="password">
                    @error('password')
                    <div class="invalid-feedback" id="password">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" id="confirmPassword" value="{{$user->password}}" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" aria-describedby="confirmPassword">
                    @error('password_confirmation')
                    <div class="invalid-feedback" id="confirmPassword">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Update Date</label>
                    <input value="{{Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s')}}" name="updated_at" id="date" type="datetime-local" class="form-control @error('date') is-invalid @enderror" aria-describedby="date">
                    @error('date')
                    <div class="invalid-feedback" id="date">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        console.log('Hello Users');
    </script>
@endsection
