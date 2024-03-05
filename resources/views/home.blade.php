<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
     <!-- Link to other pages -->
     <div class="navigation">
        <a href="{{ route('edit_user_form', ['id' => auth()->id()]) }}">Edit Profile</a>
        <a href="{{ route('update_user', ['id' => auth()->id()]) }}">Update Profile</a>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

    </div>

    <h1>Latest Posts</h1>

    <!-- Display the latest posts -->
    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->user->animal_name }}</h2>
            <p>{{ $post->content }}</p>
            @if($post->user->profileImage_url)
            <img src="{{ asset('storage/' . $post->user->profileImage_url) }}" alt="Post Image" style="max-width: 200px; max-height: 200px;>

            @endif
        </div>
    @endforeach

   

       

</body>
</html>
