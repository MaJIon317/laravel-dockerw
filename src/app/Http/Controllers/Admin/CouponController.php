<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Http\Requests\CouponRequest as Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderByDesc('created_at')->paginate(config('admin.limit'));

        return view('admin.coupons', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $action = route('admin.coupons.store');

        return view('admin.coupon-form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Coupon::create($request->all());

        return redirect()->route('admin.coupons.index')->with('success', 'Coupon added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return view('admin.coupon-show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $action = route('admin.coupons.update', $coupon);

        return view('admin.coupon-form', compact('coupon', 'action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->request->set('percent', (int)$request->request->get('percent'));
        $request->request->set('status', (int)$request->request->get('status'));

        $coupon->update($request->all());
  
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
  
        return redirect()->route('admin.coupons.index')->with('success', 'Coupon deleted successfully');
    }
}
