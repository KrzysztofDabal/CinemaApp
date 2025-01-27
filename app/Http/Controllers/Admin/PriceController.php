<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Http\Requests\PriceRequest;

class PriceController extends Controller
{
    public function index(){
        $prices = Price::all();
        return view('admin.price.index', compact('prices'));
    }

    public function add_price_form(){
        return view('admin.price.add_price_form');
    }

    public function add_price(PriceRequest $request){
        return Price::create($request->all());
    }

    public function edit($price_id){
        $price = Price::find($price_id);
        if($price){
            return view('admin.price.edit', compact('price'));
        }
        return redirect()->route('admin/price')->with('message', "Price doesn't exist");
    }

    public function update(PriceRequest $request, $price_id){
        $price = Price::find($price_id);
        if($price){
            $price->update($request->all());

            return redirect()->route('admin/price')->with('message', 'Price edited');
        }

        return redirect()->route('admin/price')->with('message', "Price doesn't exist");
    }

    public function delete($price_id){
        $price = Price::find($price_id);
        if($price){
            Price::destroy($price_id);

            return redirect()->route('admin/price')->with('message', 'Price deleted');
        }
        return redirect()->route('admin/price')->with('message', "Price doesn't exist");
    }
}
