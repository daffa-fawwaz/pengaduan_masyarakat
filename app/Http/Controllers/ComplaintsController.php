<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Dashboard.user-role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.user-role.create-complaints');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            $validatedData = $request->validate([
                'guest_name' => 'required|string',
                'guest_email' => 'required|email:dns',
                'guest_telp' => 'required|string|max:20',
                'title' => 'required',
                'image' => 'image|file|max:1024',
                'description' => 'required'
            ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images', 'public');
        }
        $validatedData['user_id'] = Auth::user()->id;

        Complaint::create($validatedData);

        return redirect('/dashboard/user')->with('success', 'Complaint berhasil dibuat');

    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $complaint = Complaint::findOrFail($id);
        // dd($complaint->image);
        Storage::disk('public')->delete($complaint->image);
        $complaint->delete();

        return redirect()->route('user.history')->with('succes', 'Complaint berhasil dihapus');
    }
}
