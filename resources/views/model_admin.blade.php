@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/model_admin.js')}}"></script>
@endsection

@section('title')
    Admin | Car Models
@endsection

@section('content')
<div class="card mx-auto w-75">
    <div class="card-header">
        <span>{{__('Models')}}</span>
        <a class="btn btn-sm btn-primary float-right"
           data-toggle="modal" href="#modal-create">
            {{__('Add model')}}
        </a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="text-center thead-dark">
                <th class="col-5">{{__('Name')}}</th>
                <th class="col-1">{{__('Actions')}}</th>
            </thead>
            <tbody class="text-center">
                @foreach ($models as $model)
                <tr id="model-{{$model->id}}">
                    <td>{{$model->name}}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteElement({{$model->id}}, 'model')">
                            <i class="fa fa-trash"></i>
                        </button>
                        <a class="btn btn-sm btn-outline-secondary btn-edit"
                            data-toggle="modal" href="#modal-edit"
                            data-id="{{$model->id}}"
                            data-name="{{$model->name}}"
                            data-brand="{{$model->brand}}"
                            data-year="{{$model->year}}"
                            data-description="{{$model->description}}"
                            data-image="{{$model->image}}"
                            data-type="{{$model->type}}"
                            data-price="{{$model->base_price}}">
                            <i class="fa fa-pen"></i>
                        </a>
                        <a href="{{route('model.show', $model->id)}}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-car"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">{{__('Editing a car model')}}</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('model.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body" id="modal-edit-body">
                    <input hidden name="id" id="id" type="number">
                    <div class="form-group">
                        <label for="edit-name">{{__('Name')}}</label>
                        <input class="form-control @error('edit-name') is-invalid @enderror" 
                            type="text" id="edit-name" name="edit-name"
                            placeholder="{{__("Enter model's name")}}">
                        @error('edit-name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-brand">{{__('Brand')}}</label>
                        <input class="form-control @error('edit-brand') is-invalid @enderror" 
                            type="text" id="edit-brand" name="edit-brand"
                            placeholder="{{__("Enter model's brand")}}">
                        @error('edit-brand')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-year">{{__('Year')}}</label>
                        <input class="form-control @error('edit-year') is-invalid @enderror" 
                            type="number" id="edit-year" name="edit-year"
                            placeholder="{{__("Enter model's year")}}">
                        @error('edit-year')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-description">{{__('Description')}}</label>
                        <textarea name="edit-description" class="form-control @error('edit-description') is-invalid @enderror" id="edit-description">
                        </textarea>
                        @error('edit-description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit-price">{{__('Base price')}}</label>
                        <input type="number" id="edit-price" name="edit-price" class="form-control-file" step="0.01">
                        @error('edit-price')
                        <small clas="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="edit_picture">{{__('Car picture')}}</label>
                        <input type="file" name="edit_picture" class="form-control-file">
                        @error('edit_picture')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    <div class="form-group">
                        <label for="edit-type">{{__('Type')}}</label>
                        <select id="edit-type" name="edit-type">
                            <option hidden disabled selected value="none">{{__('Select a type')}}</option>
                            <option value="SEDAN">{{__('Sedan')}}</option>
                            <option value="SUV">{{__('SUV')}}</option>
                            <option value="VAN">{{__('Van')}}</option>
                            <option value="MINIVAN">{{__('Minivan')}}</option>
                            <option value="HATCHBACK">{{__('Hatchback')}}</option>
                            <option value="COUPE">{{__('Coupe')}}</option>
                        </select>
                        @error('edit-type')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="{{__('Send')}}">
                </div>
            </form>
        </div>
    </div>    
</div>

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">{{__('Creating a car model')}}</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('model.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" id="modal-create-body">
                    <input hidden name="id" id="id" type="number">
                    <div class="form-group">
                        <label for="create-name">{{__('Name')}}</label>
                        <input class="form-control @error('create-name') is-invalid @enderror" 
                            type="text" id="create-name" name="create-name"
                            placeholder="{{__("Enter model's name")}}">
                        @error('create-name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-brand">{{__('Brand')}}</label>
                        <input class="form-control @error('create-brand') is-invalid @enderror" 
                            type="text" id="create-brand" name="create-brand"
                            placeholder="{{__("Enter model's brand")}}">
                        @error('create-brand')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-year">{{__('Year')}}</label>
                        <input class="form-control @error('create-year') is-invalid @enderror" 
                            type="number" id="create-year" name="create-year"
                            placeholder="{{__("Enter model's year")}}">
                        @error('create-year')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-description">{{__('Description')}}</label>
                        <textarea name="create-description" 
                                  class="form-control @error('create-description') is-invalid @enderror"
                                  id="create-description">
                        </textarea>
                        @error('create-description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-price">{{__('Base price')}}</label>
                        <input type="number" name="create-price" class="form-control-file">
                        @error('create-price')
                        <small clas="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create_picture">{{__('Car picture')}}</label>
                        <input type="file" name="create_picture" class="form-control-file">
                        @error('create_picture')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create-type">{{__('Type')}}</label>
                        <select id="create-type" name="create-type">
                            <option hidden disabled selected value="none">{{__('Select a type')}}</option>
                            <option value="SEDAN">{{__('Sedan')}}</option>
                            <option value="SUV">{{__('SUV')}}</option>
                            <option value="VAN">{{__('Van')}}</option>
                            <option value="MINIVAN">{{__('Minivan')}}</option>
                            <option value="HATCHBACK">{{__('Hatchback')}}</option>
                            <option value="COUPE">{{__('Coupe')}}</option>
                        </select>
                        @error('create-type')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <input class="btn btn-primary" type="submit" value="{{__('Send')}}">
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection