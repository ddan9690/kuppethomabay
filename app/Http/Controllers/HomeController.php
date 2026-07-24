<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\DocumentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{
  public function index()
  {
    $newsItems = News::where('visibility', 'public')
      ->latest()
      ->take(6)
      ->get();

    return view('pages.frontend.home', compact('newsItems'));
  }

  public function downloads()
  {
    $documents = DocumentUpload::where('category', 'downloads')->latest()->get();
    return view('pages.frontend.downloads', compact('documents'));
  }

  public function circulars()
  {
    $circulars = DocumentUpload::where('category', 'circulars')->latest()->get();
    return view('pages.frontend.circulars', compact('circulars'));
  }

  public function memoranda()
  {
    $documents = DocumentUpload::where('category', 'petitions-memoranda')->latest()->get();
    return view('pages.frontend.memoranda-and-petitions', compact('documents'));
  }

  public function downloadDocument(DocumentUpload $documentUpload): StreamedResponse
  {
    if (!Storage::disk('public')->exists($documentUpload->file_path)) {
      abort(404, 'File not found on server.');
    }

    $extension = pathinfo($documentUpload->file_path, PATHINFO_EXTENSION);
    $safeTitle = Str::slug($documentUpload->title);
    $filename = "{$safeTitle}.{$extension}";

    return Storage::disk('public')->download($documentUpload->file_path, $filename);
  }
}
