<?php

namespace App\Http\Livewire;

use App\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ClientMahasiswaIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    public function render()
    {
        return view('livewire.client-mahasiswa-index', [
            'mahasiswas' => $this->cari === null ? Mahasiswa::where('status', true)->paginate(8) : DB::table('mahasiswas')->where('status', true)->orWhere('nama', 'like', '%' . $this->cari . '%')->orWhere('angkatan', 'like', '%' . $this->cari . '%')->orWhere('asal', 'like', '%' . $this->cari . '%')->paginate(8),
        ]);
    }
}
