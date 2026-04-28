<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Read all data
    public function index() {
        $author = Author::all();
        return response()->json([
            'success' => true,
            'data'    => $author
        ], 200);
    }

    // Create data
    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        
        $author = Author::create(['name' => $request->name]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dibuat',
            'data'    => $author
        ], 201);
    }
}