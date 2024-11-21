<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>Upload a file</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
        <p>Uploaded file: {{ session('file') }}</p>
    @endif

    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    <br>
    <a href="/">View all files</a>
</body>
</html>
