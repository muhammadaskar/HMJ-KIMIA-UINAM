<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Blog;
use App\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $data['page'] = 'beranda';
        $data['beritas'] = Berita::latest()->limit(3)->get();

        return view('client.beranda', $data);
    }

    public function berita()
    {
        $data['page'] = 'berita';
        return view('client.berita.index', $data);
    }

    public function detailBerita($slug)
    {
        $data['page'] = 'berita';
        $data['berita'] = DB::table('beritas')->where('slug', $slug)->get()->first();
        $data['beritas'] = DB::table('beritas')->latest()->limit(4)->get();

        return view('client.berita.detail-berita', $data);
    }

    public function blog()
    {
        $data['page'] = 'blog';
        return view('client.blog.index', $data);
    }

    public function detailBlog($slug)
    {
        $data['page'] = 'blog';
        $data['blog'] = DB::table('blogs')->where('slug', $slug)->first();
        $data['blogs'] = DB::table('blogs')->latest()->limit(4)->get();

        return view('client.blog.detail-blog', $data);
    }

    public function galeri()
    {
        $data['page'] = 'galeri';
        $data['galeris'] = Galeri::latest()->paginate(6);

        return view('client.galeri.index', $data);
    }

    public function getPengurus($slug)
    {
        $data['page'] = 'pengurus';
        $data['divisi'] = DB::table('divisis')->where('slug', $slug)->first();
        $data['penguruses'] = DB::table('penguruses')->where('divisi', $slug)->get();

        return view('client.pengurus.index', $data);
    }

    public function tentang()
    {
        $data['page'] = 'tentang';
        return view('client.tentang.index', $data);
    }

    public function kontak()
    {
        $data['page'] = 'kontak';
        return view('client.kontak.index', $data);
    }
}
