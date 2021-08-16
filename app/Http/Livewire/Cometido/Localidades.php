<?php

namespace App\Http\Livewire\Cometido;

use App\Models\Ciudad;
use App\Models\Cometido;
use App\Models\Provincia;
use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class Localidades extends Component
{
    use WithPagination;

    public $provincias;
    public $ciudades;

    public $cometido;

    public function mount($cometido){
        $this->cometido = $cometido;
    }

    public function render()
    {
        return view('livewire.cometido.localidades', [
            "regiones" => Region::all(),
            "preovincias" => $this->provincias,
            "ciudades" => $this->ciudades,
        ]);
    }

    public function listarprovincias($id){
        $this->provincias = Provincia::where("region_id", "=", $id)->get();
    }

    public function listarciudades($id){
        $this->ciudades = Ciudad::all()->where("provincia_id", "=", $id)->pluck('nombre_ciudad', 'id');
    }
}
