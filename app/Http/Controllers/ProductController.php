<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use CommonTrait;
    public function index()
    {
        if (Session::has("invoiceId")) {
            Session::forget('invoiceId', 'cus_name', 'contact', 'method_id', 'dob', 'address');
        } else {

        }
        $products = Product::with('category')->get();
        // $products = Product::all();
        // dd($products);
        return $this->sendResponse(['data' => $products]);
    }
    public function indexsale()
    {
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->get();
        return $this->sendResponse(['data' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'product_name'  => 'required',
        //         'image'     => 'required|mimes:jpg,jpeg,png'
        //     ],
        // );

        $product = new Product();

        if ($request->has('image')) {
            $image = $request->file('image');

            $name = time() . uniqid() . '.' . $image->extension();
            // Store the image in the storage/app/public directory
            $path = $image->storeAs('public', $name);

            // Create a public URL using the storage link
            $imageUrl = Storage::url($path);
            $product->image = $imageUrl;
        }
        $product->product_name = $request->product_name;
        $product->SKU = $request->SKU;
        $product->cat_id = $request->cat_id;
        $product->quantity = $request->quantity;
        $product->cost = $request->cost;
        $product->dob = $request->dob;
        $product->save();

        return $this->sendResponse(['data' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // $products = DB::table('products')
        //     ->join('categories', 'products.cat_id', '=', 'categories.id')
        //     ->where('products.id', 'LIKE', '%' . $request->id . '%')
        //     ->first();
        // $path = base_path('logo-social.png');
        // $type = pathinfo($path, PATHINFO_EXTENSION);
        // $data = file_get_contents($path);
        // $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $products = Product::find($id);
        return $this->sendResponse(['data' => $products]);
    }

    public function downloadpdf(Request $request)
    {
        $products = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->where('products.id', 'LIKE', '%' . $request->id . '%')
            ->first();
        $pdf = Pdf::loadView('products.show_product', compact('products'));
        return $pdf->download('product.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->has('image')) {
            $image = $request->file('image');

            $name = time() . uniqid() . '.' . $image->extension();
            // Store the image in the storage/app/public directory
            $path = $image->storeAs('public', $name);

            // Create a public URL using the storage link
            $imageUrl = Storage::url($path);
            $product->image = $imageUrl;
        }
        $product->product_name = $request->product_name;
        $product->SKU = $request->SKU;
        $product->cat_id = $request->cat_id;
        $product->quantity = $request->quantity;
        $product->cost = $request->cost;
        $product->sale = $request->sale;
        $product->dob = $request->dob;
        $product->save();

        return $this->sendResponse(['data' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::destroy($id);
        return $this->sendResponse(['data' => $products]);
    }
}
