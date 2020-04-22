@extends('layouts.app')

@section('title')
    {{__('Car ') . $car->number_plate}}
@endsection

@section('content')
<div class="card ml-5 mr-5 mb-3">
    <div class="card-header">
        <span class="h3">{{$car->number_plate}}</span>
    </div>
    <div class="card-body">
        <b>Status:</b> {{$car->status}} <br>
        <b>Mileage:</b> {{$car->mileage}} KM <br>
        <b>Availability:</b>{{$car->availability}}<br>
    </div>
</div>

<div class="card ml-5 mr-5">
    <div class="card-header">
        <span class="h5">{{__('Incidents')}}</span>
    </div>
    <div class="card-body">
        @foreach ($incidents as $incident)
            <div class="card mb-3" id="incident-{{$incident->id}}">
                <div class="card-header" style="background-color: #b4cded">
                    {{__('Reported by: ') . $incident->user}} 
                    (<span class="text-secondary" style="font-size: 12px">
                        {{$incident->date}}
                    </span>)
                    @if($incident->user === Auth::id())
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteElement({{$incident->id}}, 'incident')">
                        <i class="fa fa-trash"></i>
                    </button>
                    @endif
                </div>
                <div class="card-body">
                    {{$incident->description}}
                </div>
            </div>
        @endforeach
        <hr>
        <form action="{{route('incident.store')}}" method="post">
            @csrf
            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="{{__('Report an incident')}}">
                </textarea>
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="date">{{__('Date')}}</label>
                <input type="date" name="date" class="form-control">
                @error('date')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <input hidden type="text" name="car" value="{{$car->number_plate}}">
            <input class="btn btn-primary" type="submit" value="{{__('Submit incident')}}">
        </form>
    </div>
</div>
    
@endsection

