@extends('layouts.app')
@section('title')
    {{__("My orders")}}
@endsection

@section('content')
<script src="{{asset('js/methods.js')}}"></script>
<table class="table mt-5" style="width: 80%; margin: 0 auto; text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{__("Car")}}</th>
      <th scope="col">{{__("From")}}</th>
      <th scope="col">{{__("To")}}</th>
      <th scope="col">{{__("Status")}}</th>
      <th scope="col">{{__("Actions")}}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($orders as $order)
    @php
        $car = App\Car::findOrFail($order->car);
        $model = App\CarModel::findOrFail($car->model);
    @endphp
    <tr id="order-{{$order->id}}">
      <td>{{ $order->id }}</td>
      <td>{{ $model->name }}</td>
      <td>{{ $order->start_date }}</td>
      <td>{{ $order->end_date}}</td>
      <td>{{ $order->status}}</td>
      <td>
        <button class="btn btn-sm btn-outline-danger" type="button" onclick="cancelOrder({{$order->id}})">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
@endsection