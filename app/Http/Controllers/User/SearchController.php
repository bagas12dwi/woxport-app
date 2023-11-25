<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $province = $request->province;
        $price = $request->price;
        $category_id = $request->category_id;

        $client = new Client();

        $response = $client->get('https://bagas12dwi.github.io/api-wilayah-indonesia/api/provinces.json');

        $provinceList = json_decode($response->getBody(), true);

        $query = Product::with(['imageProduct', 'vendor'])->where('category_id', '=', $category_id);

        if ($province != 0) {
            $query->whereHas('vendor', function ($query) use ($province) {
                $query->where('province', $province);
            });
        }

        $data = $query->orderBy('price', $price ?: 'asc')->get();


        return view('users.search', [
            'title' => 'Search',
            'vendor' => $data,
            'provinces' => $provinceList,
            'category_id' => $category_id
        ]);
    }
}
