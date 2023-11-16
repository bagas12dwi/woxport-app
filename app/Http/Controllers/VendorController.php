<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\BankAccount;
use App\Models\User;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = BankAccount::all();
        return view('vendor.toko.daftar-toko', [
            'title' => 'Daftar Toko',
            'banks' => $bank
        ]);
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
        $validatedData = $request->validate([
            'vendor_name' => 'required',
            'address' => 'required',
            'bank_account_id' => 'required',
            'bank_account_number' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Vendor::create($validatedData);
        User::where('id', auth()->user()->id)->update([
            'role' => 'vendor'
        ]);

        return redirect()->intended('/vendor/toko');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
