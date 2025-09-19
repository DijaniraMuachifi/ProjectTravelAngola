<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\provinciarequest;
use App\Models\Provincia;

class ProvinciaController extends Controller
{
    //show provincias
    public function index(){

         try {
            //bucando lista de provincias em uma api
            $resposta=Http::get('https://angolaprovinciasapi.ggwp.com.br/api/v1/provincias');

              $dados= json_decode($resposta->getBody()->getContents());

              if($dados->success){
                   $provincias=$dados->data;
 
                 
                   dd($provincias);
                   return view('Livewire.Page.Welcome', compact('$provincias'));
              }else{
                  dd('conecta seu computador a internete');
              }



         } catch (\GuzzleHttp\Exception\RequestException $th) {
            //throw $th;
            dd('Erro de conexão, verifica sua ligação a internete');
         }
         
    }

    //exibir painel principal
    public function dashboard(){
    
           $provincias=Provincia::get();
           $pcount=Provincia::count();
        return view('gerir.provincia', compact('provincias','pcount'));
    }

    public function store(provinciarequest $request){

  
        if(! Provincia::where('name','LIKE','%'.$request->name.'%')->first()){
                $verificar=Provincia::create([
                'name'=>$request->name
            ]);
                   alert($verificar['name'],"Provincia registada","info");

            return redirect()->route('dashboard1');
        }else{
              alert($request->name,"Provincia já foi registada","warning");
       return redirect()->back();
        }        
        
    }


}
