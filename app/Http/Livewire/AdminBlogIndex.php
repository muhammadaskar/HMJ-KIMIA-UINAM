<?php

namespace App\Http\Livewire;

use App\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBlogIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $cari;
    protected $queryString  = ['cari'];

    public function render()
    {
        return view('livewire.admin-blog-index', [
            'blogs' => $this->cari === null ? Blog::latest()->paginate(3) : Blog::where('judul', 'like', '%' . $this->cari . '%')->paginate(3)
        ]);
    }
}
