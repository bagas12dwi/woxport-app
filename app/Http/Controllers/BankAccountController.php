<?php

namespace App\Http\Controllers;

use App\DataTables\BankAccountDataTable;
use App\Models\BankAccount;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BankAccountDataTable $dataTable)
    {
        return $dataTable->render('admin.bank.index', [
            'title' => 'Bank Account'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bank.add', [
            'title' => 'Bank Account'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required'
        ]);

        BankAccount::create($validatedData);

        return redirect()->intended('manage-bank')->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankAccount $manage_bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankAccount $manage_bank)
    {
        return view('admin.bank.edit', [
            'title' => 'Bank Account',
            'bank' => $manage_bank
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankAccount $manage_bank)
    {
        $validatedData = $request->validate([
            'bank_name' => 'required'
        ]);

        BankAccount::where('id', $manage_bank->id)->update($validatedData);
        return redirect()->intended('manage-bank')->with('success', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankAccount $manage_bank)
    {
        BankAccount::destroy($manage_bank->id);
        return redirect()->intended('manage-bank')->with('success', 'Data Berhasil Dihapus !');
    }
}
