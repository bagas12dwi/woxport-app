<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\BankAccount;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = BankAccount::all();
        $client = new Client();

        $response = $client->get('https://bagas12dwi.github.io/api-wilayah-indonesia/api/provinces.json');

        $province = json_decode($response->getBody(), true);

        return view('vendor.toko.daftar-toko', [
            'title' => 'Daftar Toko',
            'banks' => $bank,
            'provinces' => $province
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
            'province' => 'required',
            'regency' => 'required'
        ]);

        $client = new Client();

        $responseProvince = $client->get("https://bagas12dwi.github.io/api-wilayah-indonesia/api/province/$request->province.json");
        $responseRegency = $client->get("https://bagas12dwi.github.io/api-wilayah-indonesia/api/regency/$request->regency.json");

        $province = json_decode($responseProvince->getBody(), true);
        $regency = json_decode($responseRegency->getBody(), true);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['province'] = $province['name'];
        $validatedData['regency'] = $regency['name'];

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
