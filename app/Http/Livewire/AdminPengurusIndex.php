<?php

namespace App\Http\Livewire;

use App\Pengurus;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPengurusIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    public function render()
    {
        return view('livewire.admin-pengurus-index', [
            'penguruses' => $this->cari === null ? Pengurus::paginate(8) : DB::table('penguruses')->where('nama', 'like', '%' . $this->cari . '%')->orWhere('jabatan', 'like', '%' . $this->cari . '%')->orWhere('divisi', 'like', '%' . $this->cari . '%')->paginate(8)
        ]);
    }
}
