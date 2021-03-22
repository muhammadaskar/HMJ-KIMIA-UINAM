<?php

namespace App\Http\Livewire;

use App\KritikSaran;
use Livewire\Component;
use Livewire\WithPagination;

class AdminKritikSaranIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    public function render()
    {
        return view('livewire.admin-kritik-saran-index', [
            'sarans' => KritikSaran::latest()->paginate(4)
        ]);
    }
}
