<?php

namespace App\Http\Livewire\Cometido;

use App\Models\Cometido;
use Livewire\Component;

use Livewire\WithPagination;

class CometidosJefe extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cometidos = Cometido::where('user_jefe_id','=', auth()->user()->id )
        ->where('objetivo', 'LIKE', '%' . $this->search . '%')
        ->paginate(10);
        
        return view('livewire.cometido.cometidos-jefe', compact('cometidos'));
    }
}
