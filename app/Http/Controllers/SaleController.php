<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\methods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index()
    {
        $sales=Sale::all();
        return view('sales.sale_list',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    } 
    /*Add product Sale */
    public function add_sales(Request $request)
    {
      
        $products = Product::where('products.product_name','LIKE','%'.$request->product_name.'%')
                    ->first();
        $methods= methods::all();
       return view('sales.add_sale',compact('products','methods'));
       
    }
    /*Multiple Product Add */
    public function show_sale(Request $request)
    { 
        if(Session::has('invoiceId')){
            $sales = Sale::where('invoiceId',session('invoiceId'))
            ->first();
            $sale = Sale::where('invoiceId',session('invoiceId'))
            ->get();
            return view('sales.show_sale',compact('sales','sale')); 
        }else{
            return redirect(route('sale.index'));
        }
         
       
    }
    //Add Old Product Sale
    public function add_old_sale(){

        $methods= methods::all();
        $categories= Category::all();
        return view('sales.add_old_sale',compact('categories','methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     if(!$request->invoiceId){
        $sale = new Sale();

        if(Session::has('invoiceId')){
            $sale->invoiceId    = session('invoiceId');
            $sale->cus_name     = session('cus_name');
            $sale->method_id    = session('method_id');
            $sale->contact      = session('contact');
            $sale->dob          = session('dob');
            $sale->address      = session('address');
        }else{
            $invoice = Sale::orderBy('id','DESC')->first();
            if ($invoice == null) {
                $firstReg = 0;
                $invoiceID = $firstReg+1;
                if ($invoiceID < 10) {
                    $id_no = '00'.$invoiceID;
                }elseif ($invoiceID < 100) {
                    $id_no = '0'.$invoiceID;
                }
            }else{
            $invoice = Sale::orderBy('id','DESC')->first()->id;
             $invoiceID = $invoice+1;
             if ($invoiceID < 10) {
                    $id_no = '00'.$invoiceID;
                }elseif ($invoiceID < 100) {
                    $id_no = '0'.$invoiceID;
                }
    
            }
    
            $date =  new Carbon($request->dob);
            
            $invoiceId ='HF'.$date->format('Y').$date->format('m').$id_no;

        $sale->invoiceId = $invoiceId;
        $sale->cus_name = $request->cus_name;
        $sale->method_id = $request->method_id;
        $sale->contact = $request->contact;
        $sale->dob =$request->dob;
        $sale->address =$request->address;
    }
        $product = Product::where('products.product_name','LIKE','%'.$request->product_name.'%')
                    ->first();
        $products= DB::table('products')
            ->join('categories','products.cat_id','=','categories.id')
            ->where('products.product_name','LIKE','%'.$request->product_name.'%')
            ->first();
        $sale->product_name = $request->product_name;
        $sale->cat_name     = $products->cat_name;
        $sale->cost         = $product->cost;
        $sale->SKU          = $product->SKU;
        $sale->sale         = $request->sale;
        $sale->pro_quantity = $request->pro_quantity;
        $sale->profit       = ($request->sale * $request->pro_quantity) - ($product->cost * $request->pro_quantity)  ;
        $sale->total        = $request->sale * $request->pro_quantity ;
        $sale->save();

        $product->update([
            'quantity' => $product->quantity - $request->pro_quantity, // quantity of product from order
        ]);
        if(Session::has('invoiceId')){

        }else{
            Session::put([
                'invoiceId'    => $invoiceId,
                'cus_name'     => $request->cus_name,
                'contact'      => $request->contact,
                'method_id'    => $request->method_id,
                'dob'          => $request->dob,
                'address'      => $request->address
            ]);

        }
        return redirect(route('show_sale'));
     }else{

        $sale = new Sale();
        $products= Category::where('categories.id','LIKE','%'.$request->cat_id.'%')
            ->first();
        $sale->invoiceId = $request->invoiceId;
        $sale->cus_name = $request->cus_name;
        $sale->method_id = $request->method_id;
        $sale->contact = $request->contact;
        $sale->dob =$request->dob;
        $sale->address =$request->address;
        $sale->product_name = $request->product_name;
        $sale->cat_name     = $products->cat_name;
        $sale->cost         = $request->cost;
        $sale->SKU          = $request->SKU;
        $sale->sale         = $request->sale;
        $sale->pro_quantity = $request->pro_quantity;
        $sale->profit       = ($request->sale * $request->pro_quantity) - ($request->cost * $request->pro_quantity)  ;
        $sale->total        = $request->sale * $request->pro_quantity ;
        $sale->save();
        return redirect(route('sale.index'));
     }
        
    }

    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */

    /* Product Sale Invoice */
    public function invoice(Request $request){
        if(Session::has("invoiceId")){
            Session::forget('invoiceId','cus_name','contact','method_id','dob');
        }else{

        }
        $product = Sale::where('sales.invoiceId','LIKE','%'.$request->invoiceId.'%')
                    ->first();
        $products = Sale::where('sales.invoiceId','LIKE','%'.$request->invoiceId.'%')
                    ->get();
        $path = base_path('Capture.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic ='data:image/'.$type . ';base64,' .base64_encode($data); 
        $pdf = Pdf::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('sales.invoice', compact('product','products','pic'));
        //$pdf = Pdf::loadView('sales.invoice', compact('product','products'));
        return $pdf->download('invoice.pdf');
    }

    /* Search Sale by date */
    public function reports(Request $request)
    {
        $products =Sale::whereBetween('dob',[$request->fdob, $request->ldob])
                    ->get();
        $profit  =Sale::whereBetween('dob',[$request->fdob, $request->ldob])
                    ->sum('profit');
            Session::put([
                'fdob'     => $request->fdob,
                'ldob'     => $request->ldob
            ]);

        return view('reports.product_bydate',compact('products','profit'));
    }
    
    /*Search Sale by date pdf */
    public function product_report(Request $request)
    {
        $products =Sale::whereBetween('dob',[session('fdob'), session('ldob')])
                    ->get();
        $profit  =Sale::whereBetween('dob',[session('fdob'), session('ldob')])
                    ->sum('profit'); 
        Session::forget('fdob','ldob');

        $pdf = Pdf::loadView('reports.product_report', compact('products','profit'));
        return $pdf->download('report.pdf');
    }
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
