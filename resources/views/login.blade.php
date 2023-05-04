@extends('layout')
@section('title', 'login')
@section('content')

    <div class="form-container">
        {{-- <div class="mt-5">
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
        </div> --}}

        <form action="{{ route('login.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>login now</h3>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account? <a href="registration">regiser now</a></p>
            <p>forget password? <a href="check.php">check your account now</a></p>
        </form>

    </div>





@endsection
