@extends('layouts.app')
@section('title')
    {{__("My orders")}}
@endsection

@section('content')
@if(count($orders) > 0)

<script src="{{asset('js/methods.js')}}"></script>
<table class="table table-borderless mt-5" style="width: 80%; margin: 0 auto; text-align: center; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.27);">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__("Car")}}</th>
      <th scope="col">{{__("From")}}</th>
      <th scope="col">{{__("To")}}</th>
      <th scope="col">{{__("Status")}}</th>
      <th scope="col">{{__("Debt")}}</th>
      <th scope="col">{{__("Actions")}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    <tr id="order-{{$order->id}}">
      <td>{{ $order->id }}</td>
      <td><a href="{{route('car.show', $order->car)}}">{{ $order->car }}</a></td>
      <td>{{ $order->start_date }}</td>
      <td>{{ $order->end_date}}</td>
      <td>{{ $order->status}}</td>
      <td>{{ number_format($order->debt, 2, ",", ".") }}</td>
      <td>
        <button class="btn btn-sm btn-outline-danger" type="button" onclick="deleteElement({{$order->id}}, 'order')">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
@else
  <div class="text-center">
    <img src="{{asset('images/empty-gray.png')}}" alt="empty" class="center mt-5 mb-5" width="15%">
    <span style="font-size:35px;color:gray;">You haven't placed any order yet</span>
  </div>
@endif

<a class="btn btn-lg btn-danger rounded-circle fixed-button" href="{{route('catalog')}}">
  <i class="fa fa-plus"></i>
</a>

@endsection