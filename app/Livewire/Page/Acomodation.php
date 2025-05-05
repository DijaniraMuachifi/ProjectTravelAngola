<?php

namespace App\Livewire\Page;

use App\Models\Accommodation;
use App\Models\Provincia;
use Livewire\Component;
use Livewire\WithPagination;

class Acomodation extends Component
{
    use WithPagination;
    public $provincias = [];
    public function  mount(){
        $this->provincias=Provincia::all();
    }
    public function render()
    {
        $results = Accommodation::paginate(6);
        return view('livewire.page.acomodation', [
            'results' => $results
        ])->title('acomodation');
    }
}
