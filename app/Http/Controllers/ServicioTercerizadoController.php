<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\DetalleServicioTercerizado;
use App\Servicio_Tercerizado;
use App\Http\Requests\ServicioTercerizadoStoreRequest;
use Illuminate\Http\Request;

class ServicioTercerizadoController extends Controller
{

    public function index(){
        $servicios_tercerizados = Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.index',['servicios_tercerizados'=>$servicios_tercerizados]);
    }

    public function show($id_servicio_tercerizado){
        Bitacora::tupla_bitacora('Mostrar el servicio tercerizado :'.$id_servicio_tercerizado);//bitacora
        $servicio_tercerizado =  Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $detalle_servicio_tercerizado = DetalleServicioTercerizado::all();
        return View('admin.gestionar_servicios_tercerizados.detalle_servicio_tercerizado', ['servicio_tercerizado' => $servicio_tercerizado,'detalle_servicio_tercerizado'=>$detalle_servicio_tercerizado]);
    }
    public function registrar(){
        Bitacora::tupla_bitacora('Entro al formulario de registro de servicio tercerizado');//bitaacora
        $servicios_tercerizados =  Servicio_Tercerizado::all();
        return view('admin.gestionar_servicios_tercerizados.registrar_servicio_tercerizado', ['servicios_tercerizados' => $servicios_tercerizados]);
    }


    public function guardar(ServicioTercerizadoStoreRequest $request){
        $servicio_tercerizado = new  Servicio_Tercerizado($request->all());
        $servicio_tercerizado->save();
        Bitacora::tupla_bitacora('Registro al sercicio tercerizado:'.$servicio_tercerizado->id);//bitacoras
        return redirect()->route('admin.servicio_tercerizado.index');
    }

    public function editar($id_servicio_tercerizado){
        Bitacora::tupla_bitacora('Entro al formulario para editar servicio tercerizado :'.$id_servicio_tercerizado);//bitacora
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        return View('admin.gestionar_servicios_tercerizados.editar_servicio_tercerizado', ['servicio_tercerizado' => $servicio_tercerizado]);
    }

    public function modificar(Request $request,$id_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        $servicio_tercerizado->Contacto = $request['Contacto'];
        $servicio_tercerizado->Ubicacion = $request['Ubicacion'];
        $servicio_tercerizado->telefono = $request['telefono'];
        $servicio_tercerizado->save();
        Bitacora::tupla_bitacora('Se Modifico el servicio tercerizado:'.$servicio_tercerizado->id);//bitacora
        return redirect()->route('admin.servicio_tercerizado.index');

    }

    public function eliminar($id_servicio_tercerizado){
        $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
        return View('admin.gestionar_servicio_tercerizado.eliminar_servicio_tercerizado', ['servicio_tercerizado' => $servicio_tercerizado]);
    }
    public function delete(Request $request,$id_servicio_tercerizado){
        if($request['eliminar'] == 'ELIMINAR'){
            $servicio_tercerizado = Servicio_Tercerizado::findOrFail($id_servicio_tercerizado);
            $servicio_tercerizado->delete();
            return redirect()->route('admin.servicio_tercerizado.index');
        }
        return redirect()->route('admin.servicio_tercerizado.eliminar', [$id_servicio_tercerizado]);

    }
}
