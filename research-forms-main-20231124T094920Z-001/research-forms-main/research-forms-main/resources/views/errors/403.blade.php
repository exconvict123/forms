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

        .form-container {
            margin: auto;
            width: 100%;
            max-width: 24rem;
        }
    </style>
</head>

<body>
    <form action="{{ route('logout') }}" method="post" class="form-container p-3 shadow bg-white">
        @csrf

        <div class="mb-3 text-center">
            <img src="{{ asset('application-logo.webp') }}" alt="Saint Michael College of Caraga" height="64"
                width="64" />
        </div>

        <p class="text-center text-muted">
            Your account has been disabled, please contact your system administrator.
        </p>

        <button type="submit" class="btn btn-block btn-primary">
            Return to Login Page
        </button>
    </form>
</body>

</html>
