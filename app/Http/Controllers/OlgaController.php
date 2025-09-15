<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\db_alatolahraga;

class OlgaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $olga = db_alatolahraga::all();
        return view('dashboard', compact('olga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('alatolahraga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama_barang'   => 'required|string|max:255',
            'Status_barang'    => 'required|string|max:50',
            'Jumlah_barang' => 'required|string|min:1',
            'Gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['Nama_barang', 'Status_barang', 'Jumlah_barang']);

        if ($request->hasFile('Gambar_barang')) {
            $fileName = time().'_'.$request->Gambar_barang->getClientOriginalName();
            // simpan ke storage/app/public/uploads
            $path = $request->Gambar_barang->storeAs('uploads', $fileName, 'public');
            $data['Gambar_barang'] = $path; 
        }

        db_alatolahraga::create($data);

        return redirect()->route('dashboard')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
     public function welcome()
{
    $olga = db_alatolahraga::all(); // ambil semua barang
    return view('welcome', compact('olga'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $olga = db_alatolahraga::findOrFail($id);
        return view('alatolahraga.edit', compact('olga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'Nama_barang'   => 'required|string|max:255',
            'Status_barang'    => 'required|string|max:50',
            'Jumlah_barang' => 'required|string|min:1',
            'Gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $olga = db_alatolahraga::findOrFail($id);

        $data = $request->only(['Nama_barang', 'Status_barang', 'Jumlah_barang']);

        if ($request->hasFile('Gambar_barang')) {
            $fileName = time().'_'.$request->Gambar_barang->getClientOriginalName();
            $path = $request->Gambar_barang->storeAs('uploads', $fileName, 'public');
            $data['Gambar_barang'] = $path;
        }

        $olga->update($data);

        return redirect()->route('dashboard')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $olga = db_alatolahraga::findOrFail($id);

        if ($olga->Gambar_barang && file_exists(storage_path('app/public/'.$olga->Gambar_barang))) {
            unlink(storage_path('app/public/'.$olga->Gambar_barang));
        }

        $olga->delete();

        return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus!');
    }
}
