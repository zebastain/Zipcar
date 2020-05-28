@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js" integrity="sha256-412FxT7SHXk39AYYNe8+6YGQAhZhlKhthDw2Z3qp/B0=" crossorigin="anonymous"></script>
@endsection

@section('title')
    Admin | Car Models
@endsection

@section('content')
<div class="card mx-auto w-75">
    <div class="card-header">
        <span>{{__('Models')}}</span>
        <button class="btn btn-sm btn-primary float-right">{{__('Add model')}}</button>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="text-center thead-dark">
                <th class="col-5">{{__('Name')}}</th>
                <th class="col-1">{{__('Actions')}}</th>
            </thead>
            <tbody class="text-center">
                @foreach ($models as $model)
                <tr>
                    <td>{{$model->name}}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger">
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
                            >
                            <i class="fa fa-pen"></i>
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
                <div class="modal-title">Editar una actividad</div>
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

<script>
    $ (function() {
        $("#edit-type").selectize({
            sortField: 'text'
        });
        $(document).on('click', '.btn-edit', function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var brand = $(this).data('brand');
            var description = $(this).data('description');
            var image = $(this).data('image');
            var year = $(this).data('year');
            var type = $(this).data('type');
            
            $("#modal-edit-body #id").val(id);
            $("#modal-edit-body #edit-name").val(name);
            $("#modal-edit-body #edit-brand").val(brand);
            $("#modal-edit-body #edit-year").val(year);
            $("#modal-edit-body #edit-description").val(description);
            a = $("#modal-edit-body #edit-type option")
                .filter((i,e) => $(e).val() == type)
                .prop("selected", true);
        });
    });
    

</script>

@endsection