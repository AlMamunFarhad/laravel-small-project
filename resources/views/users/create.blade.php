@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('content')
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-6">
            <h1 class="pb-3 text-center">Create user</h1>
            <form class="card p-4 bg-light" method="post" action="{{route('users.store')}}">
                @csrf
                {{--                @method('POST')--}}
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{old('name')}}" name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-describedby="name">
                    @error('name')
                    <div class="invalid-feedback" id="name">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{old('email')}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="email">
                    @error('email')
                    <div class="invalid-feedback" id="email">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror"  aria-describedby="password">
                    @error('password')
                    <div class="invalid-feedback" id="password">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" id="confirmPassword" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" aria-describedby="confirmPassword">
                    @error('password_confirmation')
                    <div class="invalid-feedback" id="confirmPassword">{{$message}}</div>
                    @enderror
                </div>
                {{--                <div class="mb-3">--}}
                {{--                    <label for="date" class="form-label">Create Date</label>--}}
                {{--                    <input name="created_at" id="date" type="date" class="form-control @error('created_at') is-invalid @enderror" aria-describedby="date">--}}
                {{--                    @error('created_at')--}}
                {{--                    <div class="invalid-feedback" id="date">{{$message}}</div>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}
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
