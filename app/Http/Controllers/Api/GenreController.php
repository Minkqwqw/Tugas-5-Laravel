<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Read all data
    public function index() {
        $genres = Genre::all();
        return response()->json([
            'success' => true,
            'data'    => $genres
        ], 200);
    }

    // Create data
    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        
        $genre = Genre::create(['name' => $request->name]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dibuat',
            'data'    => $genre
        ], 201);
    }

    // Update data
    public function show($id) {
    $genre = Genre::find($id);
    if (!$genre) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }
    return response()->json(['success' => true, 'data' => $genre], 200);
    }

    public function update(Request $request, $id) {
    $genre = Genre::find($id);
    if (!$genre) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    $request->validate(['name' => 'required']);
    $genre->update(['name' => $request->name]);

    return response()->json(['success' => true, 'message' => 'Data berhasil diupdate', 'data' => $genre]);
    }

    public function destroy($id) {
    $genre = Genre::find($id);
    if (!$genre) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    $genre->delete();
    return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
