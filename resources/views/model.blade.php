@php
    $fullname = $model->brand . ' ' .$model->name;
    $availability=App\Car::where('model', $model->id)->where('availability', 'AVAILABLE')->count();
@endphp

@extends('layouts.app')

@section('title')
    {{$fullname}}
@endsection

@section('content')
<script>
    $(function(){
        $('[type="date"]').prop('min', function(){
            var d = new Date(),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
            return [year, month, day].join('-');
        });

        $('#quality').change(function(){
            let selector = $('#car');
            selector.val([]);
            let quality = $('#quality').val();
            let modelId = {{ $model->id }};
            $.get("/cars/" + modelId, function(data, status){
                data.forEach(element => {
                    if (element.status === quality){
                        selector.append(new Option(element.number_plate, element.number_plate));
                    }
                });
            });
        });
        

    });
</script>

<div class="container m-5">
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
                    <select id="quality" class="form-control @error('car') is-invalid @enderror" name="quality">
                        <option selected disabled hidden>{{__('Select quality')}}</option>
                        <option value="GOOD">{{__('New')}}</option>
                        <option value="MEDIUM">{{__('Average')}}</option>
                        <option value="LOW">{{__('Bad')}}</option>
                    </select>
                    <label for="car">{{__("Available cars")}}</label>
                    <select id="car" class="form-control @error('car') is-invalid @enderror" name="car">
                        <option selected disable hidden>{{__('Select a car')}}</option>
                    </select>
                    @error('car')
                   <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_date">{{__('When do you want to use the car?')}}</label>
                    <input id="start_date" type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                        value="{{old('start_date')}}"   >
                    @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="end_date">{{__('When do you want to return the car?')}}</label>
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
    
</div> 
@endsection