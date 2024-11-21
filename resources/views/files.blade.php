<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Files</title>
</head>
<body>
    <h1>Uploaded Files</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @elseif (session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <ul>
        @foreach ($files as $file)
            <li>
                <a href="{{ Storage::url($file) }}" target="_blank">{{ basename($file) }}</a>

                <!-- Delete file button -->
                <form action="{{ route('file.delete', basename($file)) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <br>
    <a href="/upload">Upload more files</a>
</body>
</html>
