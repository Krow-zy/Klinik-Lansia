<?php

namespace App\Http\Controllers;

use App\Models\LansiaData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminLansiaController extends Controller
{

	public function index(Request $request): View
	{
		$query = LansiaData::query();
		if ($search = $request->string('q')->toString()) {
			$query->where(function ($q) use ($search) {
				$q->where('nama_lansia', 'like', "%{$search}%")
					->orWhere('nik', 'like', "%{$search}%");
			});
		}
		$lansias = $query->latest()->paginate(10)->withQueryString();
		return view('admin.lansia.index', compact('lansias', 'search'));
	}

	public function show(int $id): View
	{
		$lansia = LansiaData::findOrFail($id);
		return view('admin.lansia.show', compact('lansia'));
	}

	public function edit(int $id): View
	{
		$lansia = LansiaData::findOrFail($id);
		return view('admin.lansia.edit', compact('lansia'));
	}

	public function update(Request $request, int $id): RedirectResponse
	{
		$lansia = LansiaData::findOrFail($id);
		$validated = $request->validate([
			'nama_petugas' => ['required','string','max:255'],
			'nama_lansia' => ['required','string','max:255'],
			'tanggal_lahir' => ['required','date'],
			'tanggal' => ['required','date'],
			'nik' => ['required','string','max:50','unique:lansia_data,nik,' . $lansia->id],
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

		$lansia->update($validated);
		return redirect()->route('admin.lansia.index')->with('success', 'Data berhasil diperbarui.');
	}

	public function destroy(int $id): RedirectResponse
	{
		$lansia = LansiaData::findOrFail($id);
		$lansia->delete();
		return redirect()->route('admin.lansia.index')->with('success', 'Data berhasil dihapus.');
	}
}


