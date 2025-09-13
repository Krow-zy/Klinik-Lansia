<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Input Data Lansia</title>
	@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased">
	<div class="max-w-4xl mx-auto p-6">
		<h1 class="text-2xl font-semibold mb-4">Form Input Data Lansia</h1>

		@if(session('success'))
			<div class="p-3 mb-4 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
		@endif

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

		<form method="POST" action="{{ route('lansia.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
			@csrf
			<label class="flex flex-col gap-1">
				<span>Nama Petugas *</span>
				<input name="nama_petugas" type="text" class="border p-2 rounded" value="{{ old('nama_petugas') }}" required />
			</label>
			<label class="flex flex-col gap-1">
				<span>Nama Lansia *</span>
				<input name="nama_lansia" type="text" class="border p-2 rounded" value="{{ old('nama_lansia') }}" required />
			</label>
			<label class="flex flex-col gap-1">
				<span>Tanggal Lahir *</span>
				<input name="tanggal_lahir" type="date" class="border p-2 rounded" value="{{ old('tanggal_lahir') }}" required />
			</label>
			<label class="flex flex-col gap-1">
				<span>Tanggal *</span>
				<input name="tanggal" type="date" class="border p-2 rounded" value="{{ old('tanggal', now()->toDateString()) }}" required />
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>NIK *</span>
				<input name="nik" type="text" class="border p-2 rounded" value="{{ old('nik') }}" required />
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>Alamat *</span>
				<textarea name="alamat" class="border p-2 rounded" rows="3" required>{{ old('alamat') }}</textarea>
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>Tempat Tinggal *</span>
				<input name="tempat_tinggal" type="text" class="border p-2 rounded" value="{{ old('tempat_tinggal') }}" required />
			</label>
			<label class="flex flex-col gap-1">
				<span>BB (kg)</span>
				<input name="bb" type="number" step="0.1" class="border p-2 rounded" value="{{ old('bb') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>TB (cm)</span>
				<input name="tb" type="number" step="0.1" class="border p-2 rounded" value="{{ old('tb') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>LP (cm)</span>
				<input name="lp" type="number" step="0.1" class="border p-2 rounded" value="{{ old('lp') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>Tensi (mis. 120/80)</span>
				<input name="tensi" type="text" class="border p-2 rounded" value="{{ old('tensi') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>GD</span>
				<input name="gd" type="number" step="0.1" class="border p-2 rounded" value="{{ old('gd') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>AU</span>
				<input name="au" type="number" step="0.1" class="border p-2 rounded" value="{{ old('au') }}" />
			</label>
			<label class="flex flex-col gap-1">
				<span>CHDL</span>
				<input name="chdl" type="number" step="0.1" class="border p-2 rounded" value="{{ old('chdl') }}" />
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>Obat</span>
				<textarea name="obat" class="border p-2 rounded" rows="2">{{ old('obat') }}</textarea>
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>Kondisi</span>
				<textarea name="kondisi" class="border p-2 rounded" rows="2">{{ old('kondisi') }}</textarea>
			</label>
			<label class="flex flex-col gap-1 md:col-span-2">
				<span>Keluhan</span>
				<textarea name="keluhan" class="border p-2 rounded" rows="2">{{ old('keluhan') }}</textarea>
			</label>

			<div class="md:col-span-2 flex items-center gap-3 mt-2">
				<a href="{{ route('home') }}" class="px-4 py-2 rounded bg-gray-200">Kembali</a>
				<button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
			</div>
		</form>
	</div>
</body>
</html>


