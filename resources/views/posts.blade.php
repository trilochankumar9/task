<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Post List</h2>
  <div class="row text-end">
    <div class="col-12  float-left">
        <a href="{{route('create-post')}}" class="btn btn-info">
            Add Post
        </a>
    </div>
</div>
  <table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->user->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

</body>
</html>