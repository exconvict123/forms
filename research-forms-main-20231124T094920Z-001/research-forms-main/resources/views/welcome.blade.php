<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Research Forms</title>

    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            background: #e5e7eb;
        }

        .form-login {
            margin: auto;
            width: 100%;
            max-width: 24rem;
        }
    </style>
</head>
<body>
    <form action="{{ route('login') }}" method="post" class="form-login p-3 shadow bg-white">
        @csrf

        <div class="mb-3 text-center">
            <img src="{{ asset('application-logo.webp') }}" alt="Saint Michael College of Caraga" height="64" width="64" />
        </div>

        <div class="form-group">
            <label for="username">Username or Student ID</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" autofocus required />

            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required />
        </div>

        <button type="submit" class="btn mb-2 btn-block btn-primary">
            Login
        </button>

        <span class="small text-secondary">
            Don't have an account?
            <a href="{{ route('register') }}">
                Register here
            </a>
        </span>
    </form>
</body>
</html>
