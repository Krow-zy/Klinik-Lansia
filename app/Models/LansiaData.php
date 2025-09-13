<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LansiaData extends Model
{
	use HasFactory;

	protected $table = 'lansia_data';

	protected $fillable = [
		'nama_petugas',
		'nama_lansia',
		'tanggal_lahir',
		'tanggal',
		'nik',
		'alamat',
		'tempat_tinggal',
		'bb',
		'tb',
		'lp',
		'tensi',
		'gd',
		'au',
		'chdl',
		'obat',
		'kondisi',
		'keluhan',
	];

	protected $casts = [
		'tanggal_lahir' => 'date',
		'tanggal' => 'date',
		'bb' => 'decimal:2',
		'tb' => 'decimal:2',
		'lp' => 'decimal:2',
		'gd' => 'decimal:2',
		'au' => 'decimal:2',
		'chdl' => 'decimal:2',
	];
}


