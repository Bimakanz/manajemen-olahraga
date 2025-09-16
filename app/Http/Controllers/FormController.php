<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\db_alatolahraga;


class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Form::All();
        return view('form.index', compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $olga = db_alatolahraga::all();
        return view ('form.create', compact('olga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
        'Nama_barang'   => 'required|string|max:255',
        'Tanggal_pinjam'  => 'required|date',
        'Tanggal_balikin' => 'required|date|after_or_equal:Tanggal_pinjam',
        'Jumlah_barang' => 'required|integer|min:1',
        'Nama_peminjam' => 'required|string|max:255',
    ]);
    $olga = db_alatolahraga::where('Nama_barang', $request->Nama_barang)->first();
    $olga->decrement('Jumlah_barang', $request->Jumlah_barang);

    Form::create($validated);

    return redirect()->route('form.index')
                     ->with('success', 'Produk berhasil dipinjam!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function approve(string $id)
    {
        // Gantilah dengan model kamu, misalnya Form
        $form = Form::findOrFail($id);
        $form->update(['Status_barang' => 0]);

    return redirect()->route('form.index')->with('success', 'Data berhasil disetujui.');
    }



    /**
     * Remove the specified resource from storage.
     */
   public function decline($id)
    {
        $form = Form::findOrFail($id);

        // Update status peminjaman
        $form->Status_barang = 2;
        $form->save();

        // Kembalikan stok alat
         $olga = db_alatolahraga::where('Nama_barang', $form->Nama_barang)->first();
        if ($olga) {
            $olga->increment('Jumlah_barang', $form->Jumlah_barang);
        }

        return back()->with('success', 'Peminjaman ditolak dan stok dikembalikan!');
    }

}
