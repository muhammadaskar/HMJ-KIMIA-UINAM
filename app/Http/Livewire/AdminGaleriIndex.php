<?php

namespace App\Http\Livewire;

use App\Galeri;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGaleriIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    // protected $listeners = [
    //     'contactStored' => 'handleStored',
    // ];

    public function render()
    {
        return view('livewire.admin-galeri-index', [
            'galeris' => $this->cari === null ? Galeri::latest()->paginate(8) : Galeri::where('judul', 'like', '%' . $this->cari . '%')->paginate(8)
        ]);
    }

    public function hapusFoto($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        session()->flash('success-delete', 'foto ' . $galeri['judul'] . ' telah dihapus');
    }
}
