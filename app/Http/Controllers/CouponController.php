<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Coupon::all();
       return view('backend.coupon.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string',
            'quantity'=> 'required',
            'type'=> 'required',
            'percent'=> 'required',
        ]);

        $coupon = new Coupon();
        $coupon->name = $request->input('name');
        $coupon->code = $request->input('code');
        $coupon->quantity = $request->input('quantity');
        $coupon->type = $request->input('type');
        $coupon->percent = $request->input('percent');
        $coupon->save();
        return redirect()->route('admin.coupon.index');
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
        $coupon = Coupon::findorFail($id);
        return view('backend.coupon.edit',[ 'data' => $coupon]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string',
            'quantity'=> 'required',
            'type'=> 'required',
            'percent'=> 'required',
        ]);
        $coupon = Coupon::findorFail($id);
        $coupon->name = $request->input('name');
        $coupon->code = $request->input('code');
        $coupon->quantity = $request->input('quantity');
        $coupon->type = $request->input('type');
        $coupon->percent = $request->input('percent');
        $coupon->save();
        return redirect()->route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Coupon::destroy($id);

        if ($isDelete) { // x??a th??nh c??ng
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }
        // Tr??? v??? d??? li???u json v?? tr???ng th??i k??m theo th??nh c??ng l?? 200
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
    public function unset_coupon(){
        $coupon = Session::get('coupon');

        if($coupon){
            Session::forget('coupon');
            return redirect()->back()->with('message','X??a m?? khuy???n m??i th??nh c??ng');
        }
        return redirect()->back()->with('message','X??a m?? khuy???n m??i th??nh c??ng');

    }
}

