@extends('admin.template.app')
@section('contenido')
    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3">

            <form action="{{route('admin.stock_insumo.guardar')}}" method="POST">
                @csrf
                <div class="card z-depth-4">
                    <div class="card-content">


                        <span class="card-title center-align">Registrar stock de insumo</span>
                        <div class="row">
                            <div class="col s12 input-field">
                                <select name="id_producto">
                                    <option value="" disabled selected>Seleccione el insumo:</option>
                                    @foreach($insumos as $insumo)

                                        <option value="{{$insumo->id}}">{{$insumo->Nombre}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col s12 input-field">
                                <select name="id_almacen">
                                    <option value="" disabled selected>Seleccione el almacen:</option>
                                    @foreach($almacenes as $almacen)
                                        <option value="{{$almacen->id}}">{{ $almacen->ubicacion}}</option>
                                    @endforeach
                                </select>

                                <div class="col s12 input-field">
                                    <input  id="Cantidad" name="Cantidad" type="text" class="validate">
                                    <label for="Cantidad">cantidad:</label>
                                </div>


                                <div class="row">
                                    <div class="col s12 right-align">
                                        <a href="{{route('admin.stock_herramienta.index')}}" class="btn negative-primary-color" type="submit">cancelar</a>
                                        <button class="btn positive-primary-color" type="submit">registrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
            </form>


        </div>
    </div>
@endsection
