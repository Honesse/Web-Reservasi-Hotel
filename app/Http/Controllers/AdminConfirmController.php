<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Room;
use App\Models\AdminConfirm;
use Illuminate\Http\Request;

class AdminConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('paymentstatus', 0)->get();
        return view('dashboard.adminconfirm.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminConfirm $adminConfirm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminConfirm $adminConfirm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminConfirm $adminConfirm, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update(['paymentstatus' => 1]);
        $room = Room::where('status', 0)->where('post_id', $transaction->post_id)->first();
        if ($room) {
            $room->update(['status' => 1]);
            $transaction->update(['room_id' => $room->id, 'no_kamar' => $room->no_kamar,]);
        }

        return redirect()->route('adminconfirm.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminConfirm $adminConfirm)
    {
        //
    }
}
