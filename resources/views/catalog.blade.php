@extends('layouts.app')

@section('title')
    {{__('Catalog')}}    
@endsection

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        @foreach ($models as $model)
        @php
            $availability=App\Car::where('model', $model->id)->where('availability', 'AVAILABLE')->count();
        @endphp
        <div class="col-4 mb-5">
            @if ($availability != 0) <a href="{{route('model.show', $model->id)}}" class="custom-card"> @endif
                <div class="card">
                    <img src="{{asset($model->image)}}" height="260px" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$model->name}}</h5>
                        @if ($availability!=0)
                        <span style="color:gray">
                            {{__('There are ') . $availability . __(' cars avaiable')}}
                        </span>
                        @else
                        <span style="color:red">
                            {{__('There are no cars avaiable')}}
                        </span>
                        @endif
                    </div>
                </div>
            @if ($availability != 0)</a> @endif
        </div>
        @endforeach
    </div>
    
</div>
@endsection