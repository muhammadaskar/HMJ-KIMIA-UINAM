<?php

namespace App\Http\Livewire;

use App\NewPengurus;
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
    public $tahun;

    public function render()
    {
        if ($this->tahun == '2021') {
            return view('livewire.admin-pengurus-index', [
                'penguruses' => $this->cari === null ? Pengurus::paginate(8) : DB::table('penguruses')->where('nama', 'like', '%' . $this->cari . '%')->orWhere('jabatan', 'like', '%' . $this->cari . '%')->orWhere('divisi', 'like', '%' . $this->cari . '%')->paginate(8),
                'tahun' => false,
                'tahunPeriode' => $this->tahun
            ]);
        } else {
            return view('livewire.admin-pengurus-index', [
                'penguruses' => $this->cari === null ? NewPengurus::where('tahun_periode', $this->tahun)->paginate(8) : DB::table('penguruses')->where('tahun_periode', $this->tahun)->orWhere('nama', 'like', '%' . $this->cari . '%')->orWhere('jabatan', 'like', '%' . $this->cari . '%')->orWhere('divisi', 'like', '%' . $this->cari . '%')->paginate(8),
                'tahun' => true,
                'tahunPeriode' => $this->tahun
            ]);
        }
    }
}
