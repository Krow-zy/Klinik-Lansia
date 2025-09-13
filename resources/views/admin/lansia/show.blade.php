@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Detail Data</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
	<div class="border p-3 rounded">
		<div><strong>Nama Petugas:</strong> {{ $lansia->nama_petugas }}</div>
		<div><strong>Nama Lansia:</strong> {{ $lansia->nama_lansia }}</div>
		<div><strong>Tanggal Lahir:</strong> {{ $lansia->tanggal_lahir?->format('Y-m-d') }}</div>
		<div><strong>Tanggal:</strong> {{ $lansia->tanggal?->format('Y-m-d') }}</div>
		<div><strong>NIK:</strong> {{ $lansia->nik }}</div>
		<div><strong>Alamat:</strong> {{ $lansia->alamat }}</div>
		<div><strong>Tempat Tinggal:</strong> {{ $lansia->tempat_tinggal }}</div>
		<div><strong>BB:</strong> {{ $lansia->bb }}</div>
		<div><strong>TB:</strong> {{ $lansia->tb }}</div>
		<div><strong>LP:</strong> {{ $lansia->lp }}</div>
		<div><strong>Tensi:</strong> {{ $lansia->tensi }}</div>
		<div><strong>GD:</strong> {{ $lansia->gd }}</div>
		<div><strong>AU:</strong> {{ $lansia->au }}</div>
		<div><strong>CHDL:</strong> {{ $lansia->chdl }}</div>
		<div><strong>Obat:</strong> {{ $lansia->obat }}</div>
		<div><strong>Kondisi:</strong> {{ $lansia->kondisi }}</div>
		<div><strong>Keluhan:</strong> {{ $lansia->keluhan }}</div>
	</div>
</div>

<div class="mt-4">
	<a href="{{ route('admin.lansia.index') }}" class="px-4 py-2 rounded bg-gray-200">Kembali</a>
</div>
@endsection


