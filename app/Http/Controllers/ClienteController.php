<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(){
        $clientes=Cliente::all();
        return view('admin.gestionar_cliente.index',['clientes'=>$clientes]);
    }

    public function show($id_cliente){
        $cliente = Cliente::findOrFail($id_cliente);
        return View('admin.gestionar_cliente.detalle_cliente', ['cliente' => $cliente]);

    }
    public function registrar(){
        return view('admin.gestionar_cliente.registrar_cliente');
    }

    public function guardar(ClienteStoreRequest $request){
        $cliente=new Cliente($request->all());
        $cliente->save();
        return redirect()->route('admin.cliente.index');
    }

    public function editar($id_cliente){
        $cliente = Cliente::findOrFail($id_cliente);
        return View('admin.gestionar_cliente.editar_cliente', ['cliente' => $cliente]);
    }

    public function modificar(Request $request,$id_cliente){
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->nombre = $request['nombre'];
        $cliente->telefono = $request['telefono'];
        $cliente->correo_electronico = $request['correo_electronico'];
        $cliente->ci = $request['ci'];
        $cliente->nit = $request['nit'];
        $cliente->save();
        return redirect()->route('admin.cliente.index');
    }

    public function eliminar($id_cliente){
        $cliente = Cliente::findOrFail($id_cliente);
        return View('admin.gestionar_cliente.eliminar_cliente', ['cliente' => $cliente]);
    }
    public function delete(Request $request,$id_cliente){
        if($request['eliminar'] == 'ELIMINAR'){
            DB::table('vehiculo')
                ->where('id_cliente', '=', $id_cliente)
                ->delete();
            $cliente = Cliente::findOrFail($id_cliente);
            $cliente->delete();
            return redirect()->route('admin.cliente.index');
        }
        return redirect()->route('admin.cliente.eliminar', [$id_cliente]);
    }
}
