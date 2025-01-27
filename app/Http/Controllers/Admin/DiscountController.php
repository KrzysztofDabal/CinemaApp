<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use App\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function index(){
        $discounts = Discount::all();
        return view('admin.discount.index', compact('discounts'));
    }

    public function add_discount_form(){
        return view('admin.discount.add_discount_form');
    }

    public function add_discount(DiscountRequest $request){
        return Discount::create($request->all());
    }

    public function edit($discount_id){
        $discount = Discount::find($discount_id);
        if($discount){
            return view('admin.discount.edit', compact('discount'));
        }
        return redirect()->route('admin/discount')->with('message', "Discount doesn't exist");
    }

    public function update(DiscountRequest $request, $discount_id){
        $discount = Discount::find($discount_id);
        if($discount){
            $discount->update($request->all());

            return redirect()->route('admin/discount')->with('message', 'Discount edited');
        }

        return redirect()->route('admin/discount')->with('message', "Discount doesn't exist");
    }

    public function delete($discount_id){
        $discount = Discount::find($discount_id);
        if($discount){
            Discount::destroy($discount_id);

            return redirect()->route('admin/discount')->with('message', 'Discount deleted');
        }
        return redirect()->route('admin/discount')->with('message', "Discount doesn't exist");
    }
}
