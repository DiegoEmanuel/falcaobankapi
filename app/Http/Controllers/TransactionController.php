<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'price'    => 'required|numeric',
            'type'     => 'required|in:entrada,saida',
            'category' => 'required|string',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }
}