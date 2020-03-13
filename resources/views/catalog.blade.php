@extends('layouts.app')

@section('title')
    Catalog
@endsection

@section('content')
<div class="container">
    <h1 class="mb-5 text-center">{{__('Car catalog')}}</h1>
    <div class="row d-flex justify-content-center">
        @foreach ($models as $model)
        @php
            $availability=App\Car::where('model', $model->id)->count();
        @endphp
        <div class="col-4 mb-5">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$model->name}}</h5>
                    <img src="{{asset($model->image)}}" width="200px">
                    <a href="{{ route('order.create', $model->id) }}" 
                            class="btn btn-primary mt-2 @if ($availability == 0) disabled @endif">Reserve</a>
                </div>
                <div class="card-footer">
                    {{ __('Availability: ')}} {{ $availability }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection