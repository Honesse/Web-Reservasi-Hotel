<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('dashboard.index', compact('transactions'));
    }
}
