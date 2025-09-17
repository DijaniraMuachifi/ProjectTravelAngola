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
            //bucando lista de provincias
            $resposta=Http::get('https://angolaprovinciasapi.ggwp.com.br/api/v1/provincias');

              $dados= json_decode($resposta->getBody()->getContents());

              if($dados->success){
                   $provincias=$dados->data;
 
                   dd($provincias);
                   return view('Livewire.Page.Welcome', compact('$provincias'));
              }else{
                  dd('conexão falhou');
              }



         } catch (\GuzzleHttp\Exception\RequestException $th) {
            //throw $th;
            return $th;
         }
         
    }

    //exibir painel principal
    public function dashboard(){
    
           $provincias=Provincia::get();
           $pcount=Provincia::count();
        return view('gerir.home', compact('provincias','pcount'));
    }

    public function store(provinciarequest $request){

  
        if(! Provincia::where('name','LIKE','%'.$request->name.'%')->first()){
                $verificar=Provincia::create([
                'name'=>$request->name
            ]);
            return redirect()->route('dashboard1');
        }else{
       return redirect()->back();
        }
            
        
    }
}
