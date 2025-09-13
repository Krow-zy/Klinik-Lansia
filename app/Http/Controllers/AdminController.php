<?php

namespace App\Http\Controllers;

use App\Models\LansiaData;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{

	public function dashboard(): View
	{
		$stats = [
			'total_lansia' => LansiaData::count(),
			'recent' => LansiaData::latest()->take(5)->get(),
		];
		return view('admin.dashboard', $stats);
	}
}


