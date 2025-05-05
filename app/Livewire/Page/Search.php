<?php

namespace App\Livewire\Page;

use App\Models\Accommodation;
use App\Models\PrecoRota;
use App\Models\Provincia;
use App\Models\Rotas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Symfony\Component\Console\Input\Input;

class Search extends Component
{
    public $search = [];
    public $typeSearch;
    public $origin;
    public $destination;
    public $checkin_date;
    public $price_limit;
    public $checkout_date;
    public $diasDeViagem;
    public $provincias = [];


    public function mount()
    {
        $this->typeSearch = request('type');

        if ($this->typeSearch == 'tour') {
            $this->validateData();
            $rota = Rotas::where('origem_id', $this->origin)
                ->where('destino_id', $this->destination)
                ->first();

            // Se a rota existir, busca os preços das transportadoras
            if ($rota) {
                $this->search = PrecoRota::query()
                    ->join('transportadoras', 'preco_rotas.transportadora_id', '=', 'transportadoras.id')
                    ->join('rotas', 'preco_rotas.rota_id', '=', 'rotas.id')
                    ->where('preco_rotas.rota_id', $rota->id)
                    ->orderBy('preco_rotas.preco', 'asc')
                    ->select([
                        'rotas.origem_id',
                        'rotas.destino_id',
                        'preco_rotas.*',
                        'transportadoras.nome as transportadora_nome',
                        'transportadoras.tipo as tipo_transporte',
                    ])
                    ->get();
            } else {
                $this->search = collect(); // ou [] se preferir array puro
            }
        } elseif ($this->typeSearch == 'hotel') {
            $this->validateDataHotel();
            $app = Accommodation::where('location', $this->origin)
                ->get();
            if ($app) {
                // Retornar todas as acomodacoes com os preços organizado de menor preço ate menor
                //fazer o calculo do preço total de acordo com a quantidade de dias em cada  resultado
                foreach ($app as $key => $value) {
                    $app[$key]['preco_total'] = $value->price_per_night * $this->diasDeViagem;
                    $app[$key]['diasDeEstadias'] = $this->diasDeViagem;
                    $app[$key]['checkin_date'] = $this->checkin_date;
                    $app[$key]['checkout_date'] = $this->checkout_date;
                }
                // Ordenar os resultados pelo preço total
                $app = $app->sortBy('preco_total');
                // Retornar os resultados
                //fazer o calculo do preço total de acordo com a quantidade de dias

                // Retornar os resultados
                $this->search = $app;
            } else {
                /// retornar vazio
                $this->search = collect();
            }
        }
        $this->provincias = Provincia::all();
    }

    public function render()
    {
        return view('livewire.page.search')->title('Resultados da Pesquisa');
    }
    protected function validateData()
    {
        // Valida os dados de entrada

        //verificar se entrada exite e se não for nulo
        if (request('origin') && request('origin') != null) {
            $this->origin = request('origin');
        }
        if (request('destination') && request('destination') != null) {
            $this->destination = request('destination');
        }
        //verificar se entrada exite e se não for nulo e snão inferio a data actual
        $rawDate = request('checkin_date');

        if ($rawDate) {
            try {
                // Tenta interpretar a data automaticamente
                $date = Carbon::parse($rawDate);

                if ($date->isPast()) {
                    // Se estiver no passado, usa a data atual
                    $this->checkin_date = now()->format('Y-m-d');
                } else {
                    $this->checkin_date = $date->format('Y-m-d');
                }
            } catch (\Exception $e) {
                $this->checkin_date = now()->format('Y-m-d');
            }
        } else {
            $this->checkin_date = now()->format('Y-m-d');
        }
        if (request('price_limit') == null) {
            $this->price_limit = 0;
        }

        $this->origin = request('origin');
        $this->destination = request('destination');
        $this->checkin_date = request('checkin_date');
        $this->price_limit = request('price_limit');
    }
    protected function validateDataHotel()
    {

        // Valida os dados de entrada
        $destinoString = request('destino');
        //verificar se entrada exite e se não for nulo
        if (isset($destinoString)) {
            $this->origin = $destinoString;
        }
        $rawData1 = request('data1');
        $rawData2 = request('data2');

        if (!$rawData1 || !$rawData2) {
            throw new \Exception("Datas de início e fim são obrigatórias.");
        }

        try {
            $data1 = $this->parseDate($rawData1);
            $data2 = $this->parseDate($rawData2);



            // 1. data1 não pode ser no passado
            if ($data1->isPast()) {
                throw new \Exception("A data de início não pode ser no passado.");
            }

            // 2. data1 não pode ser maior que data2
            if ($data1->greaterThan($data2)) {
                throw new \Exception("A data de início não pode ser depois da data de fim.");
            }

            // 3. Se forem iguais, ajusta data2 para +1 dia
            if ($data1->equalTo($data2)) {
                $data2 = $data2->addDay();
            }

            // Atribuição final para o componente
            $this->checkin_date = $data1->format('Y-m-d');
            $this->checkout_date = $data2->format('Y-m-d');
        } catch (\Exception $e) {
            // Aqui você pode usar session()->flash() ou lançar erro para interface
            throw new \Exception("Erro ao processar as datas: " . $e->getMessage());
        }
        $this->diasDeViagem = $data1->diffInDays($data2);
        if (request('price_limit') == null) {
            $this->price_limit = 0;
        }

        $this->origin = request('destino');;
    }
    function getProvianciaName($id)
    {
        $provincia = Provincia::find($id);
        if ($provincia) {
            return $provincia->name;
        } else {
            return '';
        }
    }
    protected function parseDate($dateString)
    {
        // Lista completa de formatos de data possíveis
        $formats = [
            // Formatos ISO e padrões internacionais
            'Y-m-d',      // 2023-12-31 (ISO)
            'Y/m/d',      // 2023/12/31
            'Y.m.d',      // 2023.12.31
            'Ymd',        // 20231231 (compacto)

            // Formatos com dia/mês/ano (2 dígitos para ano)
            'd/m/Y',      // 31/12/2023 (europeu)
            'd-m-Y',      // 31-12-2023
            'd.m.Y',      // 31.12.2023
            'd\\m Y',     // 31m 2023
            'd/m/y',      // 31/12/23
            'd-m-y',      // 31-12-23
            'd.m.y',      // 31.12.23
            'd\\m y',     // 31m 23

            // Formatos com mês/dia/ano (americano)
            'm/d/Y',      // 12/31/2023 (americano)
            'm-d-Y',      // 12-31-2023
            'm.d.Y',      // 12.31.2023
            'm/d/y',      // 12/31/23
            'm-d-y',      // 12-31-23
            'm.d.y',      // 12.31.23

            // Formatos com ano/mês/dia (asiático/chinês)
            'Y/m/d',      // 2023/12/31
            'Y-m-d',      // 2023-12-31
            'Y.m.d',      // 2023.12.31

            // Formatos com nomes de meses
            'd F Y',      // 31 December 2023
            'd M Y',      // 31 Dec 2023
            'F d Y',      // December 31 2023
            'M d Y',      // Dec 31 2023
            'd F, Y',    // 31 December, 2023
            'F d, Y',    // December 31, 2023
            'd M, Y',    // 31 Dec, 2023
            'M d, Y',    // Dec 31, 2023

            // Formatos compactos com nomes de meses
            'd-F-Y',      // 31-December-2023
            'd-M-Y',      // 31-Dec-2023
            'F-d-Y',      // December-31-2023
            'M-d-Y',      // Dec-31-2023

            // Formatos com dia da semana
            'l, d F Y',   // Sunday, 31 December 2023
            'D, d F Y',   // Sun, 31 December 2023
            'l, F d Y',   // Sunday, December 31 2023
            'D, F d Y',   // Sun, December 31 2023

            // Formatos com timestamp Unix
            'U',          // Timestamp Unix (segundos desde 1970)
            'U.u',        // Timestamp Unix com microssegundos

            // Outros formatos menos comuns
            'dS F Y',    // 31st December 2023
            'd F Y g:i A', // 31 December 2023 2:30 PM
        ];

        // Primeiro tenta o Carbon::parse() que é inteligente para muitos formatos
        try {
            return Carbon::parse($dateString)->startOfDay();
        } catch (\Exception $e) {
            // Se falhar, tenta cada formato especificamente
            foreach ($formats as $format) {
                try {
                    return Carbon::createFromFormat($format, $dateString)->startOfDay();
                } catch (\Exception $e) {
                    continue;
                }
            }
        }

        throw new \Exception("Formato de data não reconhecido: " . $dateString);
    }
}
