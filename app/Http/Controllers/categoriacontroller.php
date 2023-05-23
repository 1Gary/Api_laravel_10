<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class categoriacontroller extends Controller
{
    //
    
    public function getCategoria(){

        return response()->json(categoria::all(),200);
    }

    public function getCategoriaxid($id){

        $categoria = categoria::find($id);
        if(is_null($categoria))
        {
          return response()->json(['Mensaje' => 'Registro no encontrado'],404);  
        }
        return response()->json($categoria::find($id),200);
    }

    public function agregarCategoria(Request $request){
        
        
        $categoria = categoria::create($request->all());

        return response()->json($categoria,200);
    }

    public function updatecategoria(Request $request, $id){

        $categoria = categoria::find($id);

        if(is_null($categoria))
        {
          return response()->json(['Mensaje' => 'Registro no Actualizado'],404);  
        }
        
        $categoria->update($request->all());

        return response()->json($categoria,200);
    }

    public function deletecategoria($id) //función delete categoria
    {
        $categoria = categoria::find($id);
        $categoria->delete(); //eliminar categoria
        return response()->json(['Mensaje' => 'Registro Eliminado'],200);
    }

    public function updatexcreate(Request $request){

        $cat_id = $request->input('id');

        $categoria = categoria::find($cat_id);

        if(is_null($categoria)){

            $categoria = categoria::create($request->all());

            return response()->json(['Mensaje' => 'Registro Creado'],200);
        }else{

            $categoria->update($request->all());

            return response()->json(['Mensaje' => 'Registro Actualizado'],200);
        }

    }


/*

     Tarea: CREAR UNA API -> POST INSERT CON TABLAS RELACIONADAS -->
    $cabecera = cabecera::create([]); $insert->id;

    $detalle = detalle::create($request->all());

    
    $detalle = $request->input("detalle");


    public function terminarVenta()
    {
     Crear una venta
    $venta = new Venta();
    $venta->saveOrFail();
    $idVenta = $venta->id;
    $productos = $this->obtenerProductos();
     Recorrer carrito de compras
    foreach ($productos as $producto) {
        // El producto que se vende...
        $productoVendido = new ProductoVendido();
        $productoVendido->fill([
            "id_venta" => $idVenta,
            "descripcion" => $producto->descripcion,
            "codigo_barras"
        ])

    }

*/

    
    
}
