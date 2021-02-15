<?php

namespace App\Http\Livewire;

use App\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class ClientBeritaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    public function render()
    {
        return view('livewire.client-berita-index', [
            'beritas' => $this->cari === null ? Berita::latest()->paginate(3) : Berita::where('judul', 'like', '%' . $this->cari . '%')->paginate(3)
        ]);
    }
}
