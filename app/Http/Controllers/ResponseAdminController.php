<?php

namespace App\Http\Controllers;

use App\Mail\ComplaintResponseMail;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use App\Models\ComplaintResponse;
use Illuminate\Support\Facades\Mail;

class ResponseAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.admin-role.response', [
            'complaints' => Complaint::whereIn('status', ['pending', 'proses'])->get()
        ]);
    }

    public function showResponseForm($id) {
        return view('Dashboard.admin-role.response-form', [
            'complaint' => Complaint::findOrFail($id)
        ]);
    }

    public function storeResponseForm(Request $request, $id) {
        $validatedData = $request->validate([
            'response' => 'required|max:500'
        ]);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['complaint_id'] = $id;


        ComplaintResponse::create($validatedData);


        $complaint_status = Complaint::findOrFail($id);
        $complaint_status->update(['status' => $request->status]);

        Mail::to($complaint_status->guest_email)->send(new ComplaintResponseMail($validatedData['response'], $complaint_status['title']));

        return redirect()->back()->with('success', 'Response berhasil dikirim!');
    }

    public function destroy(string $id)
    {
        //
    }
}
