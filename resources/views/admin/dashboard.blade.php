@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
	<div class="p-4 rounded border">
		<div class="text-sm text-gray-500">Total Data Lansia</div>
		<div class="text-3xl font-bold">{{ $total_lansia }}</div>
	</div>
</div>

<div>
	<h2 class="font-semibold mb-3">Entri Terbaru</h2>
	<div class="overflow-x-auto">
		<table class="min-w-full border">
			<thead>
				<tr class="bg-gray-50">
					<th class="p-2 border">Nama</th>
					<th class="p-2 border">NIK</th>
					<th class="p-2 border">Tanggal</th>
					<th class="p-2 border">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($recent as $row)
				<tr>
					<td class="p-2 border">{{ $row->nama_lansia }}</td>
					<td class="p-2 border">{{ $row->nik }}</td>
					<td class="p-2 border">{{ $row->tanggal?->format('Y-m-d') }}</td>
					<td class="p-2 border"><a href="{{ route('admin.lansia.show', $row) }}" class="text-blue-700">Lihat</a></td>
				</tr>
				@empty
				<tr><td class="p-2 border" colspan="3">Belum ada data.</td></tr>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection


