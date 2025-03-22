<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\DataTables\BarangDataTable;

class BarangController extends Controller
{
    public function index(BarangDataTable $dataTable) 
    {
        return $dataTable->render('barang.index');
    }

    public function create() 
    {
        return view('barang.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'kategori_id'  => 'required|integer|exists:m_kategori,kategori_id',
            'barang_kode'  => 'required|string|max:10|unique:m_barang,barang_kode',
            'barang_nama'  => 'required|string|max:100',
            'harga_beli'   => 'required|numeric|min:0',
            'harga_jual'   => 'required|numeric|min:0',
        ]);

        dd($request->all());

        BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
         $barang = BarangModel::findOrFail($id);
         return view('barang.edit', compact('barang'));
    }
 
    public function update(Request $request, $id) 
    {
         $request->validate([
             'kategori_id' => 'required|string|max:50',
             'barang_kode' => 'required|string|max:50',
             'barang_nama' => 'required|string|max:100',
             'harga_beli' => 'required|string|max:100',
             'harga_jual' => 'required|string|max:100',
         ]);
 
         $barang = BarangModel::findOrFail($id);
         $barang->update([
             'kategori_id' => $request->kategori_id,
             'barang_kode' => $request->barang_kode,
             'barang_nama' => $request->barang_nama,
             'harga_beli' => $request->harga_beli,
             'harga_jual' => $request->harga_jual,
         ]);
 
         return redirect()->route('barang.index')->with('success', 'barang berhasil diperbarui!');
    }

    public function delete($id) 
    {
    $barang = BarangModel::findOrFail($id);
    $barang->delete();
    return response()->json(['success' => 'Barang berhasil dihapus!']);
    }
}
