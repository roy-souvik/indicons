<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();

        return view('admin.coupons', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'coupon_count' => ['required', 'integer'],
            'percent_off' => ['required', 'integer'],
        ]);

        $couponCodes = collect();

        for ($i = 1; $i <= $request->coupon_count; $i++) {
            $code = Coupon::generateUniqueCode();
            $couponCodes->push($code);
        }

        foreach ($couponCodes as $couponCode) {
            $coupon = new Coupon();
            $coupon->code = $couponCode;
            $coupon->percent_off = $request->input('percent_off', 0);

            $coupon->save();
        }

        return redirect(route('admin.coupons.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);

        if (!empty($coupon->user_id)) {
            throw ValidationException::withMessages([
                'coupon' => 'Coupon is in use',
            ]);
        }

        $coupon->delete();

        return redirect(route('admin.coupons.index'));
    }
}
