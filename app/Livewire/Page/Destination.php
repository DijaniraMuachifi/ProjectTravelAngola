<?php

namespace App\Livewire\Page;

use App\Models\Destination as ModelsDestination;
use App\Models\Provincia;
use Livewire\Component;
use Livewire\WithPagination;

class Destination extends Component
{
    use WithPagination;
    public $origin, $destination, $checkin_date, $checkout_date, $destino, $data1, $data2;
    public $provincias = [], $search = false, $hotel = false;
    function mount()
    {
        $this->provincias = Provincia::all();

    }
    public function render()
    {
        $results = ModelsDestination::paginate(6);

        return view('livewire.page.destination', [
            'results' => $results
        ]);
    }
}
