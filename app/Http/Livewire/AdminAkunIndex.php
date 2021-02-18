<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAkunIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    public function render()
    {
        return view('livewire.admin-akun-index', [
            'users' => $this->cari === null ? User::latest()->paginate(6) : DB::table('users')->where('name', 'like', '%' . $this->cari . '%')->orWhere('name', 'like', '%' . $this->cari . '%')->paginate(6)
        ]);
    }
}
