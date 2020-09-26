<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\MediaType;
use Illuminate\Support\Facades\Validator;

class MediaTypeController extends Controller
{
    //
    public function showmass(){
        //Mostrar vista de carga masiva
        return view('media-types.insert-mass');
    }

    public function storemass(Request $r)
    {

        //Arreglo de mediatypes repetidos
        $repetidos=[];
        # code...
        //Reglas de validacion
        $reglas = [
            'media-types' => 'required|mimes:csv,txt'
        ];

        //crear validador
        $validador = Validator::make($r->all(),$reglas);

        //Validar
        if ($validador->fails()) {
            # code...
            //Enviar mensaje de error de validacion a la vista
            return redirect('media-types/insert')->withErrors($validador);
        }else{
            //Trasladar el archivo cargado a storage
            $r->file('media-types')->storeAs('media-types',$r->file('media-types')->getClientOriginalName());
            //return "tipo valido";
            $ruta = base_path(). '\storage\app\media-types\\'. $r->file('media-types')->getClientOriginalName();
           if(($puntero = fopen($ruta, 'r'))!==false){
               //Recorrer archivo
               $contadora =0;

               while (($linea = fgetcsv($puntero))!==false) {
                   # code...
                    //Buscar el media type en $linea[0]
                    $conteo = MediaType::where('Name','=', $linea[0])->get()->count();

                    //Si no hay registros en mediatype que se llamen igual
                    if ($conteo==0) {
                        # code...
                    

                        //Crear objeto mediatype
                        $m = new MediaType();
                        //se asigna el nombre del mediatype
                        $m ->Name = $linea[0];
                        //Se graba en sqlite el nuevo media-type
                        $m->save();
                        $contadora++;
                    } else {
                        //Agregar una casilla al arreglo
                        $repetidos[]= $linea[0];
                    }
               }

               //SI hubieron repetidos
               if (count($repetidos) ==0 ) {
                   # code...
                   return redirect('media-types/insert')
                        ->with('exito' ,"Carga masiva de medios realizada, Registros ingresados: { $contadora }");

               }else{
                return redirect('media-types/insert')
                ->with('exito' ,"Carga masiva con las siguientes excepciones:")
                ->with("repetidos", $repetidos);

               }
                               
           }
        
        }

        //Almacena el archivo en storage/app/media-types, con el nombre
        //media-types-csv
        
        
    }
    
}
