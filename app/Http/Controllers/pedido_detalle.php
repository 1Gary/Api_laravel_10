<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;
use App\Models\detalle_pedido;


class pedido_detalle extends Controller
{
    //

    public function  insert_pedido_detalle(Request $request)
    {
        $pedido = pedido::create($request->all());

        $latest_id = $pedido->id;
        $detalle_pedido = $request->input("detalle");

        foreach ($detalle_pedido as $detalle) {
            // El producto que se vende...
            $detallePedido = new detalle_pedido;

            $detallePedido->Codigo_producto = $detalle['Codigo_producto'];
            $detallePedido->Nombre_producto = $detalle['Nombre_producto'];
            $detallePedido->Precio_producto = $detalle['Precio_producto'];
            $detallePedido->pedido_id = $latest_id;

            //Guardar pedido...
            $detallePedido->save();
        }

        return response()->json(['Mensaje' => 'Pedido Registrado'],200);


    }
    public function  updateaddpedidoxdetalle(Request $request, $id)
  {
    $idpedido = pedido::find($id);

    if (is_null($idpedido)) {

      return response()->json(["Mensaje" => "Pedido no encontrado"], 404);
    }else{

      $idpedido->update($request->all());

      $detalle_pedido = $request->input("detalle");


      foreach ($detalle_pedido as $detalle) {

        $detalleExistente = detalle_pedido::find($detalle['id']);

        if (is_null($detalleExistente)) {

          $detalleExistente = new detalle_pedido;
        }

        $detalleExistente->Codigo_producto = $detalle['Codigo_producto'];
        $detalleExistente->Nombre_producto = $detalle['Nombre_producto'];
        $detalleExistente->Precio_producto = $detalle['Precio_producto'];
        $detalleExistente->pedido_id = $idpedido->id;
        //Guardar pedido Actualizado...
        $detalleExistente->save();
      }

      return response()->json(["Mensaje" => "Pedido Actualizado"], 200);
    }
  }

  public function getPedido_detalle_x_id($id){

        $detalle_pedido = detalle_pedido::find($id);
        if(is_null($detalle_pedido))
        {
          return response()->json(['Mensaje' => 'Registro no encontrado'],404);  
        }
        return response()->json($detalle_pedido::find($id),200);
    }

    public function get_pedido_detalle(){
          
        $pedido = pedido::all();

        foreach($pedido as $value)
        {
            $detalle = detalle_pedido::where('pedido_id', $value->id)->get();
            $arr[] = [
                "pedido" => $value->id,
                "nombre_cliente" => $value->nombre_cliente,
                "montotoal" => $value->montotoal,
                "detalle" => $detalle
            ];
         
        }

          return response()->json([$arr],200);
      }


      public function prueba(){

        //
      
      }
    
  }

 
/*

public function  updateaddpedidoxdetalle(Request $request, $id)
    {
        $idpedido= pedido::find($id);

        if(is_null($idpedido)){

            return response()->json(["Mensaje"=>"Pedido no encontrado"],404);

        }else{

            $idpedido->update($request->all());
            
            $detalle_pedido = $request->input("detalle");

            
            foreach ($detalle_pedido as $detalle) {

              $detalleExistente = detalle_pedido::find($detalle['id']);

              if(is_null($detalleExistente)){

                $detalleExistente = new detalle_pedido;
                
                $detalleExistente->Codigo_producto = $detalle['Codigo_producto'];
                $detalleExistente->Nombre_producto = $detalle['Nombre_producto'];
                $detalleExistente->Precio_producto = $detalle['Precio_producto'];
                $detalleExistente->pedido_id = $idpedido->id;
                //Guardar pedido Actualizado...
                $detalleExistente->save();
                
              }else{

              $detalleExistente->Codigo_producto = $detalle['Codigo_producto'];
              $detalleExistente->Nombre_producto = $detalle['Nombre_producto'];
              $detalleExistente->Precio_producto = $detalle['Precio_producto'];
              $detalleExistente->pedido_id = $idpedido->id;
                //Guardar pedido Actualizado...
              $detalleExistente->update();

              }
            
            
           }
           
          return response()->json(["Mensaje" => "Pedido Actualizado"],200);

        }
            
       

    }
    */
