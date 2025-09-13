@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Data</h1>

@if ($errors->any())
	<div class="p-3 mb-4 rounded bg-red-100 text-red-800">
		<strong>Terjadi kesalahan:</strong>
		<ul class="list-disc pl-6">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form method="POST" action="{{ route('admin.lansia.update', $lansia) }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
	@csrf
	@method('PUT')
	<label class="flex flex-col gap-1">
		<span>Nama Petugas *</span>
		<input name="nama_petugas" type="text" class="border p-2 rounded" value="{{ old('nama_petugas', $lansia->nama_petugas) }}" required />
	</label>
	<label class="flex flex-col gap-1">
		<span>Nama Lansia *</span>
		<input name="nama_lansia" type="text" class="border p-2 rounded" value="{{ old('nama_lansia', $lansia->nama_lansia) }}" required />
	</label>
	<label class="flex flex-col gap-1">
		<span>Tanggal Lahir *</span>
		<input name="tanggal_lahir" type="date" class="border p-2 rounded" value="{{ old('tanggal_lahir', $lansia->tanggal_lahir?->format('Y-m-d')) }}" required />
	</label>
	<label class="flex flex-col gap-1">
		<span>Tanggal *</span>
		<input name="tanggal" type="date" class="border p-2 rounded" value="{{ old('tanggal', $lansia->tanggal?->format('Y-m-d')) }}" required />
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>NIK *</span>
		<input name="nik" type="text" class="border p-2 rounded" value="{{ old('nik', $lansia->nik) }}" required />
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>Alamat *</span>
		<textarea name="alamat" class="border p-2 rounded" rows="3" required>{{ old('alamat', $lansia->alamat) }}</textarea>
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>Tempat Tinggal *</span>
		<input name="tempat_tinggal" type="text" class="border p-2 rounded" value="{{ old('tempat_tinggal', $lansia->tempat_tinggal) }}" required />
	</label>
	<label class="flex flex-col gap-1">
		<span>BB (kg)</span>
		<input name="bb" type="number" step="0.1" class="border p-2 rounded" value="{{ old('bb', $lansia->bb) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>TB (cm)</span>
		<input name="tb" type="number" step="0.1" class="border p-2 rounded" value="{{ old('tb', $lansia->tb) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>LP (cm)</span>
		<input name="lp" type="number" step="0.1" class="border p-2 rounded" value="{{ old('lp', $lansia->lp) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>Tensi (mis. 120/80)</span>
		<input name="tensi" type="text" class="border p-2 rounded" value="{{ old('tensi', $lansia->tensi) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>GD</span>
		<input name="gd" type="number" step="0.1" class="border p-2 rounded" value="{{ old('gd', $lansia->gd) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>AU</span>
		<input name="au" type="number" step="0.1" class="border p-2 rounded" value="{{ old('au', $lansia->au) }}" />
	</label>
	<label class="flex flex-col gap-1">
		<span>CHDL</span>
		<input name="chdl" type="number" step="0.1" class="border p-2 rounded" value="{{ old('chdl', $lansia->chdl) }}" />
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>Obat</span>
		<textarea name="obat" class="border p-2 rounded" rows="2">{{ old('obat', $lansia->obat) }}</textarea>
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>Kondisi</span>
		<textarea name="kondisi" class="border p-2 rounded" rows="2">{{ old('kondisi', $lansia->kondisi) }}</textarea>
	</label>
	<label class="flex flex-col gap-1 md:col-span-2">
		<span>Keluhan</span>
		<textarea name="keluhan" class="border p-2 rounded" rows="2">{{ old('keluhan', $lansia->keluhan) }}</textarea>
	</label>

	<div class="md:col-span-2 flex items-center gap-3 mt-2">
		<a href="{{ route('admin.lansia.index') }}" class="px-4 py-2 rounded bg-gray-200">Batal</a>
		<button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
	</div>
</form>
@endsection


