<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return view('categories', compact('transactions'), [
            "title" => "Daftar Transaksi",
            "active" => 'categories',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            // 'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts',
            // 'category_id' => 'required',
            // 'image' => 'image|file|max:2048',
            // 'body' => 'required',
            // 'bill' => 'required|integer'
            //'end_date' => 'required|date',
            'start_date' => 'required|date',
            'estimate' => 'required|integer',
            'post_id' => 'required|integer',
            'bill' => 'required|integer',
            'title' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['bill'] = request()->bill;

        Transaction::create($validatedData);

        return redirect('/posts')->with('success', 'Data reservasi diterima, silahkan cek status pembayaran di bagian transaksi.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $start_date = Carbon::parse($request->start_date);
        // $estimate = $request->estimate;
        // $end_date = $start_date->copy()->addDays($estimate);

        $validatedData = $request->validate([
            // 'title' => 'required|max:255',
            // 'slug' => 'required|unique:posts',
            // 'category_id' => 'required',
            // 'image' => 'image|file|max:2048',
            // 'body' => 'required',
            // 'bill' => 'required|integer'
            //'end_date' => 'required|date',
            'estimate' => 'required|integer',
            'post_id' => 'required|integer',
            'bill' => 'required|integer',
            'title' => 'required'
        ]);


        $validatedData['start_date'] = Carbon::parse($request->start_date);
        $validatedData['end_date'] = $validatedData['start_date']->copy()->addDays($validatedData['estimate']);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['post_id'] = request()->post_id;
        $validatedData['bill'] = request()->bill * request()->estimate;

        Transaction::create($validatedData);

        return redirect('/posts')->with('success', 'Data reservasi diterima, silahkan cek status pembayaran di transaksi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, $id)
    {
        $transaction = Transaction::find($id);
        $post = Post::find($transaction->post_id);
        $user = User::find($transaction->user_id);
        $room = Room::find($transaction->user_id);

        return view('category', compact('transaction', 'post', 'user', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function payment(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->paymentstatus = 'success';
        $transaction->save();

        return redirect()->route('transaction.invoice', $id);
    }

    public function invoice($id)
    {
        $transaction = Transaction::find($id);
        $post = Post::find($transaction->post_id);
        $user = User::find($transaction->user_id);

        $pdf = Pdf::loadView('invoice', compact('transaction', 'post', 'user'));
        return $pdf->download('invoice.pdf');
    }
}
