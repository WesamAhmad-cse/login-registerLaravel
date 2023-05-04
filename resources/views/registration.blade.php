@extends('layout')
@section('title', 'registration')
@section('content')
    <div class="form-container">
        <div class="mt-5">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach


                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>

        <form action="{{ route('registration.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>register now</h3>
            <input type="text" name="first_name" placeholder="enter First name" class="box" required>
            <input type="text" name="last_name" placeholder="enter Latst name" class="box" required>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="password" name="password_confirmation" placeholder="confirm password" class="box" required>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account? <a href="login">login now</a></p>
        </form>

    </div>

@endsection
