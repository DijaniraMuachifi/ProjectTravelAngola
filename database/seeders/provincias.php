<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class provincias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buscar list of province

        try {
            //bucando lista de provincias
            $resposta=Http::get('https://angolaprovinciasapi.ggwp.com.br/api/v1/provincias');

              $dados= json_decode($resposta->getBody()->getContents());

              if($dados->success){
                   $provincias=$dados->data;
 
                 foreach($provincias as  $lista){

                         $salveProvince=Provincia::create([
                            'name'=>$lista->nome
                         ]);
                 }
                   dd($provincias);
             
              }else{
                  dd('conexão falhou');
              }
         } catch (\GuzzleHttp\Exception\RequestException $th) {
            throw $th;
            
         }
    }
}
