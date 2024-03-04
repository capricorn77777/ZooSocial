<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration</h1>
    
    @if ($errors->any())
        <div>
            <strong>Validation Error:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br><br>

        <label for="animal_name">Animal Name:</label>
        <input type="text" name="animal_name" id="animal_name" value="{{ old('animal_name') }}"><br><br>

        <label for="profile_image">Profile Image:</label>
        <input type="file" name="profile_image" id="profile_image"><br><br>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
