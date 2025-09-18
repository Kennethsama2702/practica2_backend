<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FileUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:avatar,project,cv'
        ]);

        $type = $request->input('type');
        $image = $request->file('image');
        
        // Create image manager with desired driver
        $manager = new ImageManager(new Driver());
        
        // Process image based on type
        $processedImage = $manager->read($image);
        
        if ($type === 'avatar') {
            $processedImage->resize(400, 400);
        } elseif ($type === 'project') {
            $processedImage->resize(800, 600);
        }
        
        // Generate unique filename
        $filename = time() . '_' . $type . '.' . $image->getClientOriginalExtension();
        $path = "uploads/{$type}s/{$filename}";
        
        // Save processed image
        Storage::disk('public')->put($path, $processedImage->encode());
        
        $url = Storage::disk('public')->url($path);
        
        return response()->json([
            'message' => 'Imagen subida exitosamente',
            'url' => $url,
            'path' => $path
        ]);
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'path' => 'required|string'
        ]);

        $path = $request->input('path');
        
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            
            return response()->json([
                'message' => 'Imagen eliminada exitosamente'
            ]);
        }
        
        return response()->json([
            'message' => 'Imagen no encontrada'
        ], 404);
    }
}