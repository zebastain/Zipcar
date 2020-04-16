<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Car;
use App\Borrow;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders', ["orders" => Borrow::where('user', Auth::id())->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($model)
    {
        return view('create_order', ["cars" => Car::where('model', $model)->get()]);
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
            "car" => "required",
            "start_date" => "required",
            "end_date" => "required"
        ]);

        if (strtotime($request->start_date) > strtotime($request->end_date)){
            $error = ValidationException::withMessages([
                'end_date' => __('End date must be after start date'),
                'start_date' => __('Start date must be before end date')
            ]);
            throw $error;
        }

        $borrow = new Borrow;
        $borrow->user = Auth::id();
        $borrow->car = $request->car;
        $borrow->start_date = $request->start_date;
        $borrow->end_date = $request->end_date;
        $borrow->save();
        $car = Car::findOrFail($request->car);
        $car->availability = "UNAVALIABLE";
        $car->save();
        return redirect()->route("order");
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
    public function delete($id)
    {
        $borrow = Borrow::findOrFail($id);
        $car = Car::findOrFail($borrow->car);
        $car->availability = "AVAILABLE";
        $car->save();
        $borrow->delete();
        return "Deleted order " . $id;
    }
}
