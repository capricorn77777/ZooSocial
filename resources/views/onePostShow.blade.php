<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding-top: 20px;
        }
        .post-card {
            margin-bottom: 20px;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%; /* ポストの幅を調整 */
            margin: auto; /* 中央揃え */
        }
        .comment-card {
            margin-bottom: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            width: 80%; /* コメントの幅を調整 */
            margin: auto; /* 中央揃え */
        }
        .post-profile-img {
            max-width: 200px; /* ポスト画像サイズを調整 */
        }
        .comment-profile-img {
            max-width: 100px; /* コメント画像サイズを調整 */
        }
        .tweet-content {
            word-wrap: break-word;
            padding: 20px;
        }
        .tweet-footer {
            font-size: 12px;
            color: #6c757d;
            padding: 0 20px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ポスト -->
        <div class="card post-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    @if($post->user->profileImage_url)
                    <img src="{{ asset('storage/' . $post->user->profileImage_url) }}" alt="User Icon" class="post-profile-img me-3">
                    @endif
                    <div>
                        <h5 class="card-title mb-0">{{ $post->user->animal_name }}</h5>
                        <p class="card-text tweet-content">{{ $post->content }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- コメント -->
        @if ($comments->isEmpty())
        <p>No comments yet.</p>
        @else
        @foreach ($comments as $comment)
        <div class="card comment-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    @if($comment->user->profileImage_url)
                    <img src="{{ asset('storage/' . $comment->user->profileImage_url) }}" alt="User Icon" class="comment-profile-img me-3">
                    @endif
                    <div>
                        <h6 class="card-title mb-0">{{ $comment->user->name }}</h6>
                        <p class="card-text">{{ $comment->content }}</p>
                        <p class="card-text tweet-footer">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <hr>

        <!-- コメントフォーム -->
        <div class="comment-form">
            <h2>コメントを追加する</h2>
            <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">コメント内容</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
