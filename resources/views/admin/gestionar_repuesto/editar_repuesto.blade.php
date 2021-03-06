@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.repuesto.modificar',[$repuesto->id])}}" method="POST">
                @csrf
                @method("PUT")
                <div class="card z-depth-4">
                    <div class="card-content">
                        <span class="card-title center-align">Editar repuesto</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <input  id="procedencia" name="procedencia" type="text" class="validate"  value="{{$repuesto->procedencia}}">
                                <label for="procedencia">Procedencia:</label>
                            </div>

                            <div class="col s12  input-field">
                                <input id="Costo" name="Costo" type="text" class="validate" value="{{$repuesto->Costo}}">
                                <label for="Costo">Costo:</label>
                            </div>

                            <div class="col s12 input-field">
                                <input id="descripcion" name="descripcion" type="text" class="validate" value="{{$repuesto->descripcion}}">
                                <label for="descripcion">descripcion :</label>
                            </div>
                            <div class="col s12 input-field">
                                <input id="Nombre" name="Nombre" type="text" class="validate" value="{{$repuesto->Nombre}}">
                                <label for="Nombre">Nombre:</label>
                            </div>


                        <div class="row">
                            <div class="col s12 right-align">
                                <a href="{{route('admin.repuesto.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                <button class="btn positive-primary-color" type="submit">Actualizar</button>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
            </form>


        </div>
    </div>
@endsection
