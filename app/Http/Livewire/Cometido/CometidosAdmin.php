<?php

namespace App\Http\Livewire\Cometido;

use App\Models\Cometido;
use Livewire\Component;

use Livewire\WithPagination;

class CometidosAdmin extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cometidos = Cometido::where('objetivo', 'LIKE', '%' . $this->search . '%');
        
        return view('livewire.cometido.cometidos-admin', compact('cometidos'));
    }
}
