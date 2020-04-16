@extends('layouts.app')

@section('title')
    {{__('Create order')}}
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
    });
</script>

<div class="container">
    <div class="card mx-auto w-75">
        <div class="card-header">
            <span class="align-self-center">{{__("Borrow a car")}}</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <label for="car">{{__("Available cars")}}</label>
                    <select class="form-control @error('car') is-invalid @enderror" name="car">
                        <option selected disabled hidden>{{__('Select a car')}}</option>
                        @foreach ($cars as $car)
                        <option value="{{$car->id}}">{{$car->id}} ({{$car->status}})</option>
                        @endforeach        
                    </select>
                    @error('car')
                   <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="start_date">{{__('When do you want to use the car?')}}</label>
                    <input id="start_date" type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror"
                        value="{{old('start_date')}}"
                        min="{{date('Y-m-d')}}">
                    <script>minDate();</script>
                    @error('start_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="end_date">{{__('When do you want to return the car?')}}</label>
                    <input id="end_date" type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror"
                        value="{{old('end_date')}}">
                    <script>minDate();</script>
                    @error('end_date')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <input class="btn btn-primary" type="submit" value="{{__('Proceed to checkout')}}">
            </form>
        </div>
    </div>
</div>    
@endsection