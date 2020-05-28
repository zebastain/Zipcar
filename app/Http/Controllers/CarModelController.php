<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CarModel;
use App\Car;

class CarModelController extends Controller
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
    public function create()
    {
        return view('model_admin', ['models' => CarModel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "yeehaw";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = CarModel::findOrFail($id);
        $cars = Car::where('model', $model->id)->get();
        return view('model', ['model' => $model, 'cars'=>$cars]);
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
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            "edit-name" => "required",
            "edit-description" => "required",
            "edit-brand" => "required",
            "edit-year" => "required",
            "edit-type" => "required",
            "edit-picture" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);
        $model = CarModel::findOrFail($id);
        $model->name = $request->input("edit-name");
        $model->description = $request->input("edit-description");
        $model->brand = $request->input("edit-brand");
        $model->year = $request->input("edit-year");
        $model->type = $request->input("edit-type");
        $filename = "None";
        if ($request->hasFile('edit_picture')){
            if (Storage::disk('local')->exists($model->image)) {
                Storage::delete($model->image);
            }
            $filename = $model->id . '_model' . time() . '.' .  $request->edit_picture->getClientOriginalExtension();
            $request->edit_picture->storeAs('images/cars', $filename);
            $model->image = 'images/cars/' . $filename;
        }
        $model->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
