<?php

namespace App\Livewire\Page;

use App\Models\Accommodation;
use App\Models\AttractionCategory;
use App\Models\BlogPost;
use App\Models\ContactInformation;
use App\Models\Destination;
use App\Models\PrecoRota;
use App\Models\Provincia;
use App\Models\Rotas;
use Livewire\Component;

class Welcome extends Component
{
    public $origin, $destination, $checkin_date, $chechout_datecheckin_date,$destino, $data1, $data2;
    public $provincias=[],$results=[],$search=false,$hotel=false;

    public function  mount(){
        $this->provincias=Provincia::all();
    }
    public function render()
    {
        return view('livewire.page.welcome', [
            'categories' => AttractionCategory::limit(4)->get(),
            'featuredDestinations' => Destination::where('featured', true)
                ->orderBy('rating', 'desc')
                ->limit(6)
                ->get(),
            'featuredAccommodations' => Accommodation::where('featured', true)
                ->orderBy('stars', 'desc')
                ->limit(3)
                ->get(),
            'recentPosts' => BlogPost::latest()
                ->limit(3)
                ->get(),
            'contactInfo' => ContactInformation::first()
        ])->title('Descover Angola');
    }
    function search_viajem(){
        $this->search=true;
        $app=Rotas::where('origem_id', $this->origin)
            ->where('destino_id', $this->destination)

            ->first();
            // se encontrar a rota verificar os preços com cada trasportadora
        if($app){
           // Retornar todas as transportadoras com os preços organizado de menor preço ate menor
            $this->results=PrecoRota::join('transportadoras', 'preco_rotas.transportadora_id', '=', 'transportadoras.id')
            ->join('rotas', 'preco_rotas.rota_id', '=', 'rotas.id')
            ->where('preco_rotas.rota_id', $app->id)
            ->orderBy('preco_rotas.preco', 'asc')
            ->select('rotas.origem_id','rotas.destino_id','preco_rotas.*', 'transportadoras.nome as transportadora_nome')

                ->get();
        }else{
           /// retornar vazio
           $this->results=[];
        }

    }
    // Pesquisar por acomodação
    function search_hotel(){

        $this->search=true;
        $this->hotel=true;
        //calcular a diferença de dia  entre as datas
        $data1 = \Carbon\Carbon::parse($this->data1);
        $data2 = \Carbon\Carbon::parse($this->data2);
        $diferenca = $data1->diffInDays($data2);
        $app=Accommodation::where('location', $this->destino)
            ->get();
        if($app){
            // Retornar todas as acomodacoes com os preços organizado de menor preço ate menor
            //fazer o calculo do preço total de acordo com a quantidade de dias em cada  resultado
            foreach ($app as $key => $value) {
                $app[$key]['preco_total']=$value->price_per_night*$diferenca;
            }
            // Ordenar os resultados pelo preço total
            $app=$app->sortBy('preco_total');
            // Retornar os resultados
            //fazer o calculo do preço total de acordo com a quantidade de dias

            // Retornar os resultados
            $this->results=$app;
        }else{
            /// retornar vazio
            $this->results=[];
        }
    }
 function getProvianciaName($id)  {
    $provincia=Provincia::find($id);
    if($provincia){
        return $provincia->name;
    }else{
        return '';
    }

 }
}
