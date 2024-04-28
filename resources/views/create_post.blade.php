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
  <h2>Create Post</h2>
  <form method="POST" action="{{ route('post-create-action') }}">
    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea id="content"  class="form-control" name="content" required>{{ old('content') }}</textarea>
    </div>

    <div >
        <button type="submit" class="btn btn-primary ">Create Post</button>
    </div>
</form>
</div>

</body>
</html>