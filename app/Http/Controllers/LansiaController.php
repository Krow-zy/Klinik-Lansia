<?php

namespace App\Http\Controllers;

use App\Models\LansiaData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LansiaController extends Controller
{
	public function create(): View
	{
		return view('lansia.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'nama_petugas' => ['required','string','max:255'],
			'nama_lansia' => ['required','string','max:255'],
			'tanggal_lahir' => ['required','date'],
			'tanggal' => ['required','date'],
			'nik' => ['required','string','max:50','unique:lansia_data,nik'],
			'alamat' => ['required','string'],
			'tempat_tinggal' => ['required','string','max:255'],
			'bb' => ['nullable','numeric'],
			'tb' => ['nullable','numeric'],
			'lp' => ['nullable','numeric'],
			'tensi' => ['nullable','string','max:20'],
			'gd' => ['nullable','numeric'],
			'au' => ['nullable','numeric'],
			'chdl' => ['nullable','numeric'],
			'obat' => ['nullable','string'],
			'kondisi' => ['nullable','string'],
			'keluhan' => ['nullable','string'],
		]);

		LansiaData::create($validated);

		return redirect()->route('lansia.create')->with('success', 'Data lansia berhasil disimpan.');
	}
}


