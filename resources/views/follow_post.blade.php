<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZooSocial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d3f8d3; /* より明るい背景色 */
            margin: 0;
            padding: 0;
        }

        .navigation {
            background-color: #ffffff;
            padding: 10px;
            display: flex;
            justify-content: center; /* 中央寄せ */
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 2; /* ナビゲーションより手前に表示 */
        }

        .navigation h1 {
            margin: 0;
            font-size: 2em; /* 大きなサイズに変更 */
            color: #1da1f2; /* スタイリッシュな色 */
        }

        .btn-container {
            position: fixed;
            left: 20px;
            top: 120px; /* タイトルの高さ + 余白 */
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 1; /* ナビゲーションより手前に表示 */
        }

        .btn-container a {
            color: #1da1f2;
            text-decoration: none;
            border: 2px solid #1da1f2;
            padding: 15px 30px; /* ボタンの余白を調整 */
            border-radius: 30px; /* ボタンを丸くする */
            transition: all 0.3s ease;
            font-size: 1.2em; /* ボタンの文字サイズを大きく */
            text-align: center;
            width: fit-content;
        }

        .btn-container a:hover {
            background-color: #1da1f2;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .profile-container {
            position: fixed;
            top: 120px; /* タイトルの高さ + 余白 */
            right: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1; /* ナビゲーションより手前に表示 */
        }

        .profile-container img {
            width: 33%; /* 画像のサイズを調整 */
            height: auto;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-container p {
            margin: 0;
            text-align: center;
        }

        .profile-info {
    display: flex;
    align-items: center;
}

.profile-image {
    width: 50px; /* 画像の適切なサイズに調整 */
    height: 50px;
    border-radius: 50%;
    margin-right: 10px; /* 画像と名前の間隔を設定 */
}

.animal-name {
    margin: 0;
    font-size: 1.2em;
    color:#1e88e5;
    font-family: "Montserrat", sans-serif;/* かわいらしいフォントを指定 */
}

        .form-container {
            position: fixed;
            top: 250px; /* プロフィールコンテナの下 */
            right: 20px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1; /* ナビゲーションより手前に表示 */
        }

        .form-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-container form input[type="text"],
        .form-container form textarea {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .form-container form input[type="submit"] {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #1da1f2;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container form input[type="submit"]:hover {
            background-color: #0f7ae5;
        }

        .post-container {
            padding-top: 120px; /* タイトルの高さ + 余白 */
            display: flex;
            flex-wrap: wrap; /* 自動的に折り返す */
            justify-content: space-between; /* 中央揃え */
            gap: 10px; /* 投稿同士の余白を設定 */
            margin-left: 220px; /* リンクの幅 + 余白 */
            margin-right: 20%; /* プロフィールとフォームの幅 */
        }

        .post {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 6px;
            width: calc(23% - 20px); /* 幅を三分の一に */
            height: calc(13% - 20px); /* 幅を三分の一に */
        }

        .post h2 {
            color: #1da1f2;
            margin-top: 0;
            font-size: 1.5em; /* 投稿のタイトルの文字サイズを大きく */
        }

        .post p {
            margin-bottom: 0;
            font-size: 1.2em; /* 投稿の本文の文字サイズを大きく */
        }

        .post img {
            max-width: 50%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .post a {
            display: block;
            margin-top: 10px; /* ボタンと本文の間隔 */
            color: #1da1f2;
            text-decoration: none;
            border: 2px solid #1da1f2;
            padding: 8px 16px; /* ボタンの余白を調整 */
            border-radius: 30px; /* ボタンを丸くする */
            transition: all 0.3s ease;
            font-size: 0.8em; /* ボタンの文字サイズを大きく */
            width: fit-content;
            text-align: center;
        }

        .post a:hover {
            background-color: #1da1f2;
            color: #ffffff;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Link to other pages -->
    <div class="navigation">
        <h1>ZooSocial</h1>
    </div>

    <div class="btn-container">
        <a href="{{ route('edit', ['id' => auth()->id()]) }}">Edit Profile</a>
        <a href="{{ route('showMyPage', ['id' => auth()->id()]) }}">YourPostShow</a>
        <a href="{{ route('posts.create') }}">新規投稿</a>
        <a href="{{ route('home')}}">Back To Home</a> <!-- ここに追加 -->
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- User Profile Container -->
    <div class="profile-container" style="right: 20px;">
       
        @if(Auth::check())
            @if(Auth::user()->profileImage_url)
                <img src="{{ asset('storage/' . Auth::user()->profileImage_url) }}" alt="User Profile Image" 
                style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #1da1f2;"">
            @endif
            <p>{{ Auth::user()->animal_name }}</p>
        @endif
        
    </div>

    <!-- Post Creation Form Container -->
    <div class="form-container">
        <h2>POST</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="タイトル">
            <textarea name="content" placeholder="What's on your mind?"></textarea>
            <input type="submit" value="投稿する">
        </form>
    </div>

    <!-- Add the new button and post container here -->
<!-- ボタン -->
<button id="togglePosts">Toggle Posts</button>
    <div id="postContainer" div class="post-container">
        <!-- Display the latest posts -->
        @foreach($posts as $post)
            <div class="post">
                <div class="profile-info">
                    @if($post->user->profileImage_url)
                        <img src="{{ asset('storage/' . $post->user->profileImage_url) }}" alt="Post Image" 
                        style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #1da1f2;">
                    @endif
                    <p class="animal-name">{{ $post->user->animal_name }}</p>
                </div>
                <p>{{ $post->content }}</p>
                <a href="{{ route('comments.show', ['post' => $post->id]) }}">Comment</a>
                <form action="{{ route('follow', ['user' => $post->user->id]) }}" method="POST">
                @csrf
                <button type="submit">
                    @if(auth()->user()->isFollowing($post->user))
                        フォロー解除
                    @else
                        フォローする
                    @endif
                </button>
            </form>
            </div>
        @endforeach
    </div>

   
</body>
</html>
