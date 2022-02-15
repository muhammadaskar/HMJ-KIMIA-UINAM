<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Blog;
use App\Galeri;
use App\KritikSaran;
use App\Mahasiswa;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function getPengurus($tahun, $slug)
    {
        $data['page'] = 'pengurus';
        $data['divisi'] = DB::table('divisis')->where('slug', $slug)->first();

        if ($tahun == '2021') {
            $data['tahun'] = true;
            $data['penguruses'] = DB::table('penguruses')->where('divisi', $slug)->get();
        } else {
            $data['tahun'] = false;
            $data['tahunPeriode'] = $tahun;
            $divisi = DB::table('new_penguruses')->where('divisi', $slug)->get();

            if ($divisi == '[]') {
                $data['penguruses'] = DB::table('new_penguruses')->where('divisi', $slug)->where('tahun_periode', $tahun)->get();
            } else {
                if ($divisi[0]->divisi == $slug && $divisi[0]->tahun_periode == $tahun) {
                    $data['penguruses'] = DB::table('new_penguruses')->where('divisi', $slug)->where('tahun_periode', $tahun)->get();
                }
            }
        }

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

    public function kritikSaran(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kritik_saran' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect()->route('kontak')->with('gagal', 'kritik dan saran wajib diisi !');
            return response()->json(['gagal' => 'kritik dan saran wajib diisi !']);
        } else {
            KritikSaran::create($request->all());
            // return redirect()->route('kontak')->with('success', 'Kritik dan Saran anda berhasil dikirim');
            return response()->json(['success' => 'Kritik dan Saran anda berhasil dikirim']);
        }
    }

    public function mahasiswa()
    {
        $data['page'] = 'mahasiswa';
        return view('client.mahasiswa.index', $data);
    }

    public function tambahDataMahasiswa()
    {
        $data['page'] = 'mahasiswa';
        $tahun_sekarang = date("Y");
        $tahunnn = array(2006);
        $tahun = 2007;

        while ($tahun <= $tahun_sekarang) {
            array_push($tahunnn,  $tahun);
            $tahun++;
        }
        $data['tahun'] = $tahunnn;
        return view('client.mahasiswa.tambah-data', $data);

        // $tgl = "11, Mei, 2000";
        // $lahir = explode(", ", $tgl);
        // print_r($lahir[2]);
        // return;
    }

    public function postTambahDataMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'tempat_lahir' => 'required|min:5',
            'tahun' => 'required',
            'bulan' => 'required',
            'tanggal' => 'required',
            'angkatan' => 'required',
            'asal' => 'required',
        ]);


        $mahasiswa = new Mahasiswa();

        $nama = $request->nama;

        $mahasiswa->nama = $nama;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;

        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $tanggal = $request->tanggal;

        $mahasiswa->tanggal_lahir = "$tanggal, $bulan, $tahun";

        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->asal = $request->asal;
        $mahasiswa->status = false;

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $nama = \Illuminate\Support\Str::slug($mahasiswa->nama, '-');
                $fileName = time() . '-' . $nama . '.' . $extensi;
                $file->move(public_path("assets/img/mahasiswa/$request->angkatan/"), $fileName);

                $mahasiswa->foto = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa')->with('message', 'mahasiswa berhasil disimpan, data anda akan diproses');
    }
}
