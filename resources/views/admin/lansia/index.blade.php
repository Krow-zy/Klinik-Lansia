@extends('layouts.admin')

@section('content')
<div class="flex items-center justify-between mb-4">
	<h1 class="text-2xl font-semibold">Data Lansia</h1>
	<form method="GET" class="flex gap-2">
		<input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama/NIK" class="border p-2 rounded">
		<button class="px-3 py-2 bg-blue-600 text-white rounded">Cari</button>
	</form>
</div>

@if(session('success'))
	<div class="p-3 mb-4 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
@endif

<div class="overflow-x-auto">
	<table class="min-w-full border text-sm">
		<thead>
			<tr class="bg-gray-50">
				<th class="p-2 border">Nama</th>
				<th class="p-2 border">NIK</th>
				<th class="p-2 border">Tanggal</th>
				<th class="p-2 border">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($lansias as $row)
			<tr>
				<td class="p-2 border">{{ $row->nama_lansia }}</td>
				<td class="p-2 border">{{ $row->nik }}</td>
				<td class="p-2 border">{{ $row->tanggal?->format('Y-m-d') }}</td>
				<td class="p-2 border">
					<a href="{{ route('admin.lansia.show', $row) }}" class="text-blue-700">Lihat</a>
					<span class="mx-2">|</span>
					<a href="{{ route('admin.lansia.edit', $row) }}" class="text-amber-700">Edit</a>
					<span class="mx-2">|</span>
					<form action="{{ route('admin.lansia.destroy', $row) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
						@csrf
						@method('DELETE')
						<button class="text-red-700">Hapus</button>
					</form>
				</td>
			</tr>
			@empty
			<tr><td class="p-2 border" colspan="4">Tidak ada data.</td></tr>
			@endforelse
		</tbody>
	</table>
</div>

<div class="mt-4">{{ $lansias->links() }}</div>
@endsection


