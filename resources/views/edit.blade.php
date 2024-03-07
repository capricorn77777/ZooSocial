<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update_user', ['id' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br>
        <label for="profileImage_url">Profile Image URL:</label><br>
        <input type="text" id="profileImage_url" name="profileImage_url" value="{{ $user->profileImage_url }}"><br>
        <label for="animal_name">Animal Name:</label><br>
        <input type="text" id="animal_name" name="animal_name" value="{{ $user->animal_name }}"><br>
        <!-- Add other input fields as needed -->
        <button type="submit">Update</button>
    </form>
</body>
</html>
