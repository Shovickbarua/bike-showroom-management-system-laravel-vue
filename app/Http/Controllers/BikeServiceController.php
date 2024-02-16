<?php

namespace App\Http\Controllers;

use App\Models\BikeSale;
use App\Models\Bike;
use App\Models\BikeService;
use App\Models\Method;
use App\Traits\CommonTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class BikeSaleController extends Controller
{
    use CommonTrait;
    public function index()
    {
        $bikes = Bikesale::with('method')->get();
        return $this->sendResponse(['data' => $bikes]);
    }

    public function create(Request $request)
    {

    }

    //Old bike Sale Add


    public function store(Request $request)
    {
        // dd($request);
        //dd($request->invoiceId);
        if (!$request->invoiceId) {

            $invoice = Bikesale::orderBy('id', 'DESC')->first();
            if ($invoice == null) {
                $firstReg = 0;
                $invoiceID = $firstReg + 1;
                if ($invoiceID < 10) {
                    $id_no = '00' . $invoiceID;
                } elseif ($invoiceID < 100) {
                    $id_no = '0' . $invoiceID;
                }
            } else {
                $invoice = Bikesale::orderBy('id', 'DESC')->first()->id;
                $invoiceID = $invoice + 1;
                if ($invoiceID < 10) {
                    $id_no = '00' . $invoiceID;
                } elseif ($invoiceID < 100) {
                    $id_no = '0' . $invoiceID;
                }

            }

            $date = new Carbon($request->dob);

            $invoiceId = 'HF' . $date->format('Y') . $date->format('m') . $id_no;
            //dd($invoiceId);
            $product = Bike::where('bikes.id', 'LIKE', '%' . $request->bike_id . '%')
                ->first();
            $bike = new Bikesale();
            $bike->invoiceId = $invoiceId;
            $bike->client_name = $request->client_name;
            $bike->fName = $request->fName;
            $bike->nid = $request->nid;
            $bike->method_id = $request->method_id;
            $bike->dob = $request->dob;
            $bike->contact = $request->contact;
            $bike->address = $request->address;
            $bike->brand = $product->brand;
            $bike->bike_name = $product->bike_name;
            $bike->bsquantity = $request->bsquantity;
            $bike->engine_no = $product->engine_no;
            $bike->chas_no = $product->chas_no;
            $bike->m_veh = $product->m_veh;
            $bike->manu = $product->manu;
            $bike->cc = $product->cc;
            $bike->seat_cap = $product->seat_cap;
            $bike->brake = $product->brake;
            $bike->ftyre = $product->ftyre;
            $bike->rtyre = $product->rtyre;
            $bike->color = $request->color;
            $bike->weight = $product->weight;
            $bike->sale_price = $request->sale_price;
            $bike->registration = $request->registration;
            $bike->bank_draft = $request->bank_draft;
            $bike->brta = $request->brta;
            $bike->profit = ($request->sale_price * $request->bsquantity) - ($product->bcost * $request->bsquantity) + ($request->registration - ($request->bank_draft + $request->brta));
            $bike->total = ($request->sale_price * $request->bsquantity) + $request->registration + $request->bank_draft + $request->brta;
            $bike->save();

            $product->update([
                'bquantity' => $product->bquantity - $request->bsquantity, // quantity of product from order
            ]);

            $service = new BikeService();
            $service->invoiceId = $invoiceId;
            $service->client_name = $request->client_name;
            $service->contact = $request->contact;
            $service->address = $request->address;
            $service->bike_name = $request->bike_name;
            $service->bsquantity = $request->bsquantity;
            $service->service_type = "first";
            $service->first_service = (new Carbon($request->dob))->addDays(20);
            $service->second_service = (new Carbon($request->dob))->addDays(35);
            $service->third_service = (new Carbon($request->dob))->addDays(140);
            $service->fourth_service = (new Carbon($request->dob))->addDays(200);
            $service->fifth_service = (new Carbon($request->dob))->addDays(260);
            $service->sixth_service = (new Carbon($request->dob))->addDays(320);
            $service->seventh_service = (new Carbon($request->dob))->addDays(380);
            $service->eighth_service = (new Carbon($request->dob))->addDays(440);

            $service->f_date = (new Carbon($service->first_service))->addDays(10);
            $service->s_date = (new Carbon($service->second_service))->addDays(10);
            $service->t_date = (new Carbon($service->third_service))->addDays(10);
            $service->four_date = (new Carbon($service->fourth_service))->addDays(10);
            $service->fifth_date = (new Carbon($service->fifth_service))->addDays(10);
            $service->six_date = (new Carbon($service->sixth_service))->addDays(10);
            $service->seven_date = (new Carbon($service->seventh_service))->addDays(10);
            $service->eighth_date = (new Carbon($service->eighth_service))->addDays(10);
            $service->save();


        } else {
            $bike = new Bikesale();
            dd($request);
            if ($request->has('cus_photo')) {
                $image = $request->file('cus_photo');

                $name = time() . uniqid() . '.' . $image->extension();
                // Store the image in the storage/app/public directory
                $path = $image->storeAs('public', $name);

                // Create a public URL using the storage link
                $imageUrl = Storage::url($path);
                $bike->cus_photo = $imageUrl;
            }

            if ($request->has('b_copy')) {
                $image = $request->file('b_copy');

                $name = time() . uniqid() . '.' . $image->extension();
                // Store the image in the storage/app/public directory
                $path = $image->storeAs('public', $name);

                // Create a public URL using the storage link
                $imageUrl = Storage::url($path);
                $bike->b_copy = $imageUrl;
            }

            if ($request->has('r_slip')) {
                $image = $request->file('r_slip');

                $name = time() . uniqid() . '.' . $image->extension();
                // Store the image in the storage/app/public directory
                $path = $image->storeAs('public', $name);

                // Create a public URL using the storage link
                $imageUrl = Storage::url($path);
                $bike->r_slip = $imageUrl;
            }
            if ($request->has('t_token')) {
                $image = $request->file('t_token');

                $name = time() . uniqid() . '.' . $image->extension();
                // Store the image in the storage/app/public directory
                $path = $image->storeAs('public', $name);

                // Create a public URL using the storage link
                $imageUrl = Storage::url($path);
                $bike->t_token = $imageUrl;
            }
            $bike->invoiceId = $request->invoiceId;
            $bike->client_name = $request->client_name;
            $bike->fName = $request->fName;
            $bike->nid = $request->nid;
            $bike->method_id = $request->method_id;
            $bike->dob = $request->dob;
            $bike->contact = $request->contact;
            $bike->address = $request->address;
            $bike->brand = $request->brand;
            $bike->bike_name = $request->bike_name;
            $bike->bsquantity = $request->bsquantity;
            $bike->engine_no = $request->engine_no;
            $bike->chas_no = $request->chas_no;
            $bike->m_veh = $request->m_veh;
            $bike->manu = $request->manu;
            $bike->cc = $request->cc;
            $bike->seat_cap = $request->seat_cap;
            $bike->brake = $request->brake;
            $bike->ftyre = $request->ftyre;
            $bike->rtyre = $request->rtyre;
            $bike->color = $request->color;
            $bike->weight = $request->weight;
            $bike->sale_price = $request->sale_price;
            $bike->registration = $request->registration;
            $bike->bank_draft = $request->bank_draft;
            $bike->brta = $request->brta;
            $bike->profit = ($request->sale_price * $request->bsquantity) - ($request->bcost * $request->bsquantity) + ($request->registration - ($request->bank_draft + $request->brta));
            $bike->total = ($request->sale_price * $request->bsquantity) + $request->registration + $request->bank_draft + $request->brta;
            $bike->save();

            //Bike Service

            $service = new BikeService();
            $service->invoiceId = $request->invoiceId;
            $service->client_name = $request->client_name;
            $service->contact = $request->contact;
            $service->address = $request->address;
            $service->bike_name = $request->bike_name;
            $service->bsquantity = $request->bsquantity;
            $service->first_service = (new Carbon($request->dob))->addDays(20);
            $service->second_service = (new Carbon($request->dob))->addDays(35);
            $service->third_service = (new Carbon($request->dob))->addDays(140);
            $service->fourth_service = (new Carbon($request->dob))->addDays(200);
            $service->fifth_service = (new Carbon($request->dob))->addDays(260);
            $service->sixth_service = (new Carbon($request->dob))->addDays(320);
            $service->seventh_service = (new Carbon($request->dob))->addDays(380);
            $service->eighth_service = (new Carbon($request->dob))->addDays(440);
            $service->save();

        }
        return $this->sendResponse(['data' => $bike]);
    }



    public function bikeinvoice(Request $request)
    {
        $bike = Bikesale::where('bikesales.invoiceId', 'LIKE', '%' . $request->invoiceId . '%')
            ->first();
        $path = base_path('Capture.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $pdf = Pdf::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('bikes.invoice_bike', compact('bike', 'pic'));
        // $pdf = Pdf::loadView('bikes.invoice_bike', compact('bike'));
        return $pdf->download('bikeinvoice.pdf');
    }
    public function show($id)
    {
        $bike = Bike::find($id);
        return $this->sendResponse(['data' => $bike]);
    }

    public function method()
    {
        $methods = Method::all();
        return $this->sendResponse(['data' => $methods]);
    }


    public function edit(Bikesale $bikesale)
    {
        //
    }


    public function update(Request $request, Bikesale $bikesale)
    {
        //
    }


    public function destroy($id)
    {
        $bike = Bikesale::destroy($id);
        return $this->sendResponse(['data' => $bike]);
    }
}
