<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Show upload form
    public function create()
    {
        return view('upload');
    }

    // Handle file upload
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        // Store file
        $filePath = $request->file('file')->store('uploads', 'local');

        return back()->with('success', 'File uploaded successfully!')->with('file', $filePath);

        // return redirect('/');
    }

    // List all files
    public function index()
    {
        $files = Storage::files('uploads');
        return view('files', compact('files'));
    }

    // Delete a file
    public function destroy($filename)
    {
        // Check if the file exists
        $filePath = 'uploads/' . $filename;

        if (Storage::exists($filePath)) {
            // Delete the file
            Storage::delete($filePath);

            return back()->with('success', 'File deleted successfully!');
        } else {
            return back()->with('error', 'File not found!');
        }
    }
}
