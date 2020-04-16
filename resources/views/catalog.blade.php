@extends('layouts.app')

@section('title')
    Catalog
@endsection

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        @foreach ($models as $model)
        @php
            $availability=App\Car::where('model', $model->id)->where('availability', 'AVAILABLE')->count();
        @endphp
        <div class="col-4 mb-5">
            <a href="{{route('order.create', $model->id)}}" class="custom-card @if ($availability == 0) disabled @endif">
                <div class="card">
                    <img src="{{asset($model->image)}}" height="260px" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$model->name}}</h5>
                        <span style="color:gray">
                            @if ($availability==0)
                            {{__('There are no cars available')}}
                            @else
                            {{__('There are ') . $availability . __(' cars avaiable')}}
                            @endif
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    
</div>
@endsection