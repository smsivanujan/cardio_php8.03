<?php

namespace App\Http\Controllers;

use App\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurgeryController extends Controller
{
    public function index()
    {
        $surgeries = DB::table('surgery_types')
            ->select('id', 'surgery_name')
            ->orderByDesc('surgery.id')
            ->get();

        return view('pages.index', compact('surgeries'));
    }
}
