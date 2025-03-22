<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        LevelModel::create([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);
        return redirect('/level')->with('success', 'Level berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('level.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kodeLevel' => 'required|string|max:50',
            'namaLevel' => 'required|string|max:100',
        ]);

        $level = LevelModel::findOrFail($id);
        $level->update([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);

        return redirect('/level')->with('success', 'Level berhasil diperbarui.');
    }

    public function delete($id)
    {
        $level = LevelModel::findOrFail($id);
        $level->delete();

        return redirect('/level')->with('success', 'Level berhasil dihapus.');
    }
}
