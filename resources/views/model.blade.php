@php
    $fullname = $model->brand . ' ' .$model->name;
    $availability=App\Car::where('model', $model->id)->where('availability', 'AVAILABLE')->count();
@endphp

@section('scripts')
    <script src="{{asset('js/model.js')}}"></script>
@endsection

@extends('layouts.app')

@section('title')
    {{$fullname}}
@endsection

@section('content')
<div class="container m-5" id="car-model" data-id="{{$model->id}}">
    @if (Auth::user()->role == 'user')
    <div class="row">
        <div class="col">
            <img src="{{asset($model->image)}}" alt="{{$fullname}}" width="100%" height="400px">
        </div>
        <div class="col align-self-center">
            <h1>{{$fullname}}</h1>
            <form method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <label for="quality">{{__("Quality")}}</label>
                    <select id="car-quality" name="quality">
                        <option value="none" disabled hidden>{{__('Select quality')}}</option>
                        <option value="GOOD">{{__('New')}}</option>
                        <option value="MEDIUM">{{__('Average')}}</option>
                        <option value="BAD">{{__('Bad')}}</option>
                    </select>

                    <label for="car" class="mt-2">{{__("Available cars")}}</label>
                    <select id="car" name="car">
                        
                    </select>
                    @error('car')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="start_date" class="mt-2">{{__('When do you want to use the car?')}}</label>
                    <input id="start_date" type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                        value="{{old('start_date')}}"   >
                    @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <label for="end_date" class="mt-2">{{__('When do you want to return the car?')}}</label>
                    <input id="end_date" type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                        value="{{old('end_date')}}">
                    @error('end_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <input class="btn btn-primary" type="submit" value="{{__('Rent this car')}}">
            </form>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <span class="h4">{{__('Description')}}</span>
                </div>
                <div class="card-body">
                    <p style="font-size: 15px;">{{$model->description}}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (Auth::user()->role == 'admin')
    <form method="post" action="{{route('car.store')}}">
        @csrf    
        <div class="row">
            <input type="number" name="model" hidden value="{{$model->id}}">
            <div class="col-2">
                <input class="@error('create-plate') is-invalid @enderror form-control" type="text" name="create-plate" id="create-plate" placeholder="{{__('Cars\'s number plate')}}">
            </div>
            <div class="col-1">
                <select class="@error('create-status') is-invalid @enderror" name="create-status" id="create-status">
                    <option value="BAD">{{__('Old')}}</option>
                    <option value="MEDIUM">{{__('Medium')}}</option>
                    <option value="GOOD">{{__('New')}}</option>
                </select>
            </div>
            <div class="col-2">
                <input min="0" class="form-control @error('create-mileage') is-invalid @enderror" type="number" name="create-mileage" id="create-mileage" placeholder="{{__('Cars\'s mileage')}}">
            </div>
            <div class="col-1">
                <input type="submit" class="btn btn-success" value="+">
            </div>
        </div>
    </form>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <span class="h4">{{__('Cars')}}</span>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>{{__('Number plate')}}</th>
                                <th>{{__('Availability')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Mileage')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr id="car-{{$car->number_plate}}">
                                    <td>{{$car->number_plate}}</td>
                                    <td>{{$car->availability}}</td>
                                    <td>{{$car->status}}</td>
                                    <td>{{$car->mileage}}</td>
                                    <td>
                                        <button onclick="deleteElement('{{$car->number_plate}}', 'car')" class="btn btn-outline-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    @endif
    
    
</div> 
@endsection