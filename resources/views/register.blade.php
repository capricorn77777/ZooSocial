<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Validation Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                <div class="invalid-feedback">
                    Please provide a name.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                <div class="invalid-feedback">
                    Please provide a valid email.
                </div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="invalid-feedback">
                    Please provide a password.
                </div>
            </div>

            <div class="mb-3">
                <label for="animal_name" class="form-label">Animal Name</label>
                <input type="text" name="animal_name" id="animal_name" class="form-control" value="{{ old('animal_name') }}" required>
                <div class="invalid-feedback">
                    Please provide an animal name.
                </div>
            </div>

            <div class="mb-3">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <!-- ゲストログインフォーム -->
    <form method="POST" action="{{ route('guest.login') }}">
        @csrf

        <button type="submit" class="btn btn-secondary">ゲストログイン</button>
    </form>

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
