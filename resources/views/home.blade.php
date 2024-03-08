<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .navigation {
            background-color: #ffffff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navigation a {
            color: #1da1f2;
            text-decoration: none;
            margin-right: 20px;
        }

        .navigation a:hover {
            text-decoration: underline;
        }

        .post {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .post h2 {
            color: #1da1f2;
            margin-top: 0;
        }

        .post p {
            margin-bottom: 0;
        }

        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
     <!-- Link to other pages -->
     <div class="navigation">
        <a href="{{ route('edit', ['id' => auth()->id()]) }}">Edit Profile</a>
        <a href="{{ route('showMyPage', ['id' => auth()->id()]) }}">MyPost</a>
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
            <img src="{{ asset('storage/' . $post->user->profileImage_url) }}" alt="Post Image" style="max-width: 200px; max-height: 200px;">
            @endif
        </div>
    @endforeach
</body>
</html>
