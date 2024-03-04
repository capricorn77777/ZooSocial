<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Latest Posts</h1>

    <!-- Display the latest posts -->
    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->user->animal_name }}</h2>
            <p>{{ $post->content }}</p>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="Post Image">
            @endif
        </div>
    @endforeach

    <!-- Link to other pages -->
    <div class="navigation">
        <a href="{{ route('edit_user_form', ['id' => auth()->id()]) }}">Edit Profile</a>
        <a href="{{ route('update_user', ['id' => auth()->id()]) }}">Update Profile</a>
       
    </div>
</body>
</html>
