<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini

use App\Models\Item; // Mengimpor model Item yang digunakan untuk berinteraksi dengan database
use Illuminate\Http\Request; // Mengimpor class Request untuk menangani input dari form

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Mengambil semua data item dari database dan membaginya menjadi halaman-halaman dengan 10 item per halaman
        return view('items.index', compact('items')); // Mengembalikan view 'items.index' dan mengirimkan data items yang sudah di-page ke view tersebut
    }

    public function create()
    {
        return view('items.create'); // Mengembalikan view 'items.create' yang berisi form untuk membuat item baru
    }

    public function store(Request $request)
    {
        $request->validate([ // Melakukan validasi data input dari form
            'name' => 'required', // Atribut 'name' harus diisi
            'description' => 'required', // Atribut 'description' harus diisi
        ]);

        //Item::create($request->all());
        //return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
         Item::create($request-> only(['name', 'description']));
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // Melakukan redirect ke route 'items.index' dengan pesan sukses
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Mengembalikan view 'items.show' dan mengirimkan data item yang akan ditampilkan ke view tersebut
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Mengembalikan view 'items.edit' yang berisi form untuk mengedit item yang sudah ada
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([ // Melakukan validasi data input dari form
            'name' => 'required', // Atribut 'name' harus diisi
            'description' => 'required', // Atribut 'description' harus diisi
        ]);

        //$item->update($request->all()); // Update semua atribut model dengan data dari form (rawan mass assignment vulnerability)
        //return redirect()->route('items.index');//
        // Hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description'])); // Hanya update atribut 'name' dan 'description' untuk menghindari mass assignment vulnerability
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Melakukan redirect ke route 'items.index' dengan pesan sukses
    }

    public function destroy(Item $item)
    {

        // return redirect()->route{'items.index'};
        $item->delete(); // Menghapus data item dari database
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Melakukan redirect ke route 'items.index' dengan pesan sukses
    }
}