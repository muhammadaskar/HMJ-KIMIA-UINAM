<?php

namespace App\Http\Livewire;

use App\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBeritaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];
    public function render()
    {
        return view('livewire.admin-berita-index', [
            'beritas' => $this->cari === null ? Berita::latest()->paginate(2) : Berita::where('judul', 'like', '%' . $this->cari . '%')->paginate(2)
        ]);
    }
}
