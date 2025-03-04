<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class UserController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'complaints'=>Complaint::paginate(5)
        ]);
    }

    public function showResponse($id) {
        return view('Dashboard.user-role.response', [
            'response' => Complaint::with(['response', 'user'])->findOrFail($id)
        ]);
    }

    public function showHistory() {
        return view('Dashboard.user-role.riwayat', [
            'complaints' => Complaint::all()
        ]);
    }
}
