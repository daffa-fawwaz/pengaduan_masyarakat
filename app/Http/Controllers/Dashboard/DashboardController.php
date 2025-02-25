<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        if(Auth::user()->role == 'admin') {
            $all = Complaint::count();
            $pending = Complaint::where('status', 'pending')->count();
            $proses = Complaint::where('status', 'proses')->count();
            $selesai = Complaint::where('status', 'selesai')->count();
            $todayComplaints = Complaint::whereDate('created_at', now()->today())->get();
            return view('dashboard.admin-role.index', [
                'all'=>$all,
                'pending'=>$pending,
                'proses'=>$proses,
                'selesai'=>$selesai,
                'todayComplain'=>$todayComplaints
            ]);
        }else {
            $all = Complaint::count();
            $pending = Complaint::where('user_id', Auth::user()->id)->where('status', 'pending')->count();;
            $proses = Complaint::where('user_id', Auth::user()->id)->where('status', 'proses')->count();;
            $selesai = Complaint::where('user_id', Auth::user()->id)->where('status', 'selesai')->count();;
            return view('dashboard.user-role.index', [
                'all'=>$all,
                'pending'=>$pending,
                'proses'=>$proses,
                'selesai'=>$selesai,
            ]);
        }
    }
}
