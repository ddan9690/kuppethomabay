<?php

namespace App\Http\Controllers;

use App\Models\DocumentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentUploadController extends Controller
{
    public function index()
    {
        $documents = DocumentUpload::latest()->paginate(10);
        return view('pages.backend.document_uploads.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:downloads,circulars,petitions-memoranda',
            'document_file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:15360',
        ]);

        if ($request->hasFile('document_file')) {
            $filePath = $request->file('document_file')->store("document_uploads/{$request->category}", 'public');

            DocumentUpload::create([
                'title' => $request->input('title'),
                'file_path' => $filePath,
                'category' => $request->input('category'),
            ]);
        }

        return redirect()->route('admin.document_uploads.index')->with('success', 'Document uploaded and published successfully!');
    }

    public function download(DocumentUpload $documentUpload): StreamedResponse
    {
        if (!Storage::disk('public')->exists($documentUpload->file_path)) {
            abort(404, 'File not found on server.');
        }

        $extension = pathinfo($documentUpload->file_path, PATHINFO_EXTENSION);
        $safeTitle = Str::slug($documentUpload->title);
        $filename = "{$safeTitle}.{$extension}";

        return Storage::disk('public')->download($documentUpload->file_path, $filename);
    }

    public function destroy(DocumentUpload $documentUpload)
    {
        $documentUpload->delete();

        return redirect()->route('admin.document_uploads.index')->with('success', 'Document deleted successfully!');
    }
}