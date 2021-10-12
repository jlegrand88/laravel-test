<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Interfaces\IShippingService;

use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $shipmentSuccess = ($request->session()->has('shipmentSuccess')) ? $request->session()->get('shipmentSuccess') : false;
        return view('shipping/shipping-form',['shipmentSuccess' => $shipmentSuccess]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, IShippingService $shippingService)
    {
        if($request->input('destination') == 1){
            $destinationAddress = "Sucursal EEUU, Avenue lorem ipsum dolor 13000";
        } elseif ($request->input('destination') == 2) {
            $destinationAddress = "Sucursal X región Chile, Avenida lorem ipsum dolor 16000";
        }
        $shipment = $shippingService->store(
            $request->input('name'),
            $request->input('height'),
            $request->input('width'),
            $request->input('weight'),
            $destinationAddress
        );
        return redirect()->route('shippings.create')->with('shipmentSuccess', $shipment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
