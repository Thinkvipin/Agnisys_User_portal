<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReleaseFolderController extends Controller
{
    //
    public function specificRoute($file)
    {
        //Check if the authenticated user has permission to access the file
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }
    
        $filePath = 'agnisys/' . $file;
    
        // Log the file path for debugging
        \Log::info('File path: ' . $filePath);
    
        // Serve the file from the agnisys folder
        if (!Storage::disk('local')->exists($filePath)) {
            abort(404, 'File not found');

        }
    
        return response()->file(Storage::disk('local')->path($filePath));
    }
}
