<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Blog;
use App\Galeri;
use App\Mahasiswa;
use App\NewPengurus;
use App\Pengurus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $data['page'] = 'dashboard';
        return view('admin.dashboard', $data);
    }

    public function berita()
    {
        $data['page'] = 'berita';
        return view('admin.berita.index', $data);
    }

    public function tambahBerita()
    {
        $data['page'] = 'berita';
        return view('admin.berita.tambah-berita', $data);
    }

    public function postTambahBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        $berita = new Berita();
        $judul = $request->input('judul');
        $berita->judul = $judul;
        $berita->slug = \Illuminate\Support\Str::slug($judul, '-');
        $berita->isi = $request->input('isi');

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $judul . '.' . $extensi;
                $file->move(public_path('assets/img/berita/'), $fileName);
                $berita->gambar = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $berita->save();

        return redirect()->route('admin-berita')->with('message', 'Berita Berhasil Disimpan');
    }

    public function detailBerita($slug)
    {
        $data['page'] = 'berita';
        $data['berita'] = DB::table('beritas')->where('slug', $slug)->get()->first();

        return view('admin.berita.detail-berita', $data);
    }

    public function editBerita($id)
    {
        $data['page'] = 'berita';
        $data['berita'] = Berita::find($id);

        return view('admin.berita.edit-berita', $data);
    }

    public function postEditBerita(Request $request, Berita $berita)
    {
        if ($request->hasFile('gambar')) {
            if ($berita->gambar && $request->gambar) {
                unlink(public_path('assets/img/berita/') . $berita->gambar);
            }
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $request->judul . '.' . $extensi;
                $file->move(public_path('assets/img/berita/'), $fileName);
                Berita::where('id', $berita->id)
                    ->update([
                        'judul' => $request->judul,
                        'slug' =>  \Illuminate\Support\Str::slug($request->judul, '-'),
                        'isi' => $request->isi,
                        'gambar' => $fileName
                    ]);
            } else {
                return redirect()->route('admin-berita')->with('failed', 'File Tidak Valid');
            }
        } else {
            Berita::where('id', $berita->id)
                ->update([
                    'judul' => $request->judul,
                    'slug' =>  \Illuminate\Support\Str::slug($request->judul, '-'),
                    'isi' => $request->isi
                ]);
        }
        return redirect()->route('admin-berita')->with('message', 'Berita Berhasil Diubah');
    }

    public function hapusBerita($id)
    {
        $berita = Berita::find($id);
        if (empty($berita)) {
            return redirect()->route('admin-berita')->with('failed', 'Berita gagal dihapus');
        }

        unlink(public_path('assets/img/berita/') . $berita->gambar);
        $berita->delete();
        return redirect()->route('admin-berita')->with('message', 'Berita berhasil dihapus');
    }

    public function blog()
    {
        $data['page'] = 'blog';

        return view('admin.blog.index', $data);
    }

    public function tambahBlog()
    {
        $data['page'] = 'blog';

        return view('admin.blog.tambah-blog', $data);
    }

    public function postTambahBlog(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
        ]);

        $blog = new Blog();
        $judul = $request->input('judul');
        $blog->judul = $judul;
        $blog->slug = \Illuminate\Support\Str::slug($judul, '-');
        $blog->isi = $request->input('isi');

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $judul . '.' . $extensi;
                $file->move(public_path('assets/img/blog/'), $fileName);
                $blog->gambar = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $blog->save();

        return redirect()->route('admin-blog')->with('message', 'Blog berhasil disimpan');
    }

    public function detailBlog($slug)
    {
        $data['page'] = 'blog';
        $data['blog'] = DB::table('blogs')->where('slug', $slug)->first();

        return view('admin.blog.detail-blog', $data);
    }

    public function editBlog($id)
    {
        $data['page'] = 'blog';
        $data['blog'] = DB::table('blogs')->where('id', $id)->first();

        return view('admin.blog.edit-blog', $data);
    }

    public function postEditBlog(Request $request, Blog $blog)
    {
        if ($request->hasFile('gambar')) {
            if ($blog->gambar && $request->gambar) {
                unlink(public_path('assets/img/blog/') . $blog->gambar);
            }
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $request->judul . '.' . $extensi;
                $file->move(public_path('assets/img/blog/'), $fileName);
                Blog::where('id', $blog->id)
                    ->update([
                        'judul' => $request->judul,
                        'slug' =>  \Illuminate\Support\Str::slug($request->judul, '-'),
                        'isi' => $request->isi,
                        'gambar' => $fileName
                    ]);
            } else {
                return redirect()->route('admin-blog')->with('failed', 'File Tidak Valid');
            }
        } else {
            Blog::where('id', $blog->id)
                ->update([
                    'judul' => $request->judul,
                    'slug' =>  \Illuminate\Support\Str::slug($request->judul, '-'),
                    'isi' => $request->isi
                ]);
        }
        return redirect()->route('admin-blog')->with('message', 'Blog Berhasil Diubah');
    }

    public function hapusBlog($id)
    {
        $blog = Blog::find($id);
        if (empty($blog)) {
            return redirect()->route('admin-blog')->with('failed', 'blog gagal dihapus');
        }

        unlink(public_path('assets/img/blog/') . $blog->gambar);
        $blog->delete();
        return redirect()->route('admin-blog')->with('message', 'blog berhasil dihapus');
    }

    public function galeri()
    {
        $data['page'] = 'galeri';
        return view('admin.galeri.index', $data);
    }

    public function tambahGaleri()
    {
        $data['page'] = 'galeri';
        return view('admin.galeri.tambah-galeri', $data);
    }

    public function postTambahGaleri(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
        ]);

        $galeri = new Galeri();
        $judul = $request->input('judul');
        $galeri->judul = $judul;
        $galeri->slug = \Illuminate\Support\Str::slug($judul, '-');
        $galeri->kategori = $request->kategori;

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $judul . '.' . $extensi;
                $file->move(public_path('assets/img/galeri/'), $fileName);
                $galeri->gambar = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $galeri->save();

        return redirect()->route('admin-galeri')->with('message', 'galeri berhasil disimpan');
    }

    public function pengurus($tahun)
    {
        $data['page'] = 'pengurus';
        $data['tahunPeriode'] = $tahun;

        return view('admin.pengurus.index', $data);
    }

    public function tambahPengurus($tahun)
    {
        $data['page'] = 'pengurus';
        $data['tahunPeriode'] = $tahun;

        return view('admin.pengurus.tambah-pengurus', $data);
    }

    public function postTambahPengurus(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $tahun = $request->input('tahun');

        $pengurus = new Pengurus();

        if (isset($tahun)) {
            $pengurus = new NewPengurus();
        }


        $divisi = $request->input('divisi');

        $pengurus->nama = $request->input('nama');
        $pengurus->divisi = $request->input('divisi');
        $pengurus->jabatan = $request->input('jabatan');
        $pengurus->tahun_periode = $tahun;

        $nama = \Illuminate\Support\Str::slug($pengurus->nama, '-');



        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $nama . '.' . $extensi;
                if (isset($tahun)) {
                    $file->move(public_path("assets/img/pengurus/$tahun/"), $fileName);
                } else {
                    $file->move(public_path("assets/img/pengurus/"), $fileName);
                }

                $pengurus->foto = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $pengurus->save();

        return redirect()->route('admin-pengurus', $tahun)->with('message', 'pengurus berhasil disimpan');
    }

    public function editPengurus($tahunPeriode, $id)
    {
        $data['page'] = 'pengurus';
        if ($tahunPeriode == '2021') {
            $data['tahun'] = $tahunPeriode;
            $data['pengurus'] = Pengurus::find($id);
        } else {
            $data['tahun'] = $tahunPeriode;
            $data['pengurus'] = NewPengurus::find($id);
        }
        return view('admin.pengurus.edit-pengurus', $data);
    }

    public function postEditPengurus(Request $request, Pengurus $pengurus)
    {

        $nama = \Illuminate\Support\Str::slug($pengurus->nama, '-');
        $tahun = $request->tahun;
        if (isset($tahun)) {
            $Pengurus = new NewPengurus();
        } else {
            $Pengurus = new Pengurus();
        }

        if ($request->hasFile('gambar')) {
            if ($pengurus->foto && $request->foto) {
                if (isset($tahun)) {
                    unlink(public_path("assets/img/pengurus/$tahun/") . $pengurus->foto);
                } else {
                    unlink(public_path("assets/img/pengurus/") . $pengurus->foto);
                }
            }
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $nama . '.' . $extensi;
                if (isset($tahun)) {
                    $file->move(public_path("assets/img/pengurus/$tahun/"), $fileName);
                } else {
                    $file->move(public_path("assets/img/pengurus/"), $fileName);
                }


                $Pengurus::where('id', $pengurus->id)
                    ->update([
                        'nama' => $request->nama,
                        'divisi' =>  $request->divisi,
                        'jabatan' => $request->jabatan,
                        'foto' => $fileName
                    ]);
            } else {
                return redirect()->route('admin-pengurus')->with('failed', 'File Tidak Valid');
            }
        } else {
            $Pengurus::where('id', $pengurus->id)
                ->update([
                    'nama' => $request->nama,
                    'divisi' =>  $request->divisi,
                    'jabatan' => $request->jabatan
                ]);
        }
        return redirect()->route('admin-pengurus', $tahun)->with('message', 'pengurus Berhasil Diubah');
    }

    public function hapusPengurus($tahunPeriode, $id)
    {
        if ($tahunPeriode == '2021') {
            $pengurus = DB::table('penguruses')->where('id', $id)->first();
            if (empty($pengurus)) {
                return redirect()->route('admin-pengurus', $tahunPeriode)->with('failed', 'gagal dihapus');
            }

            DB::table('penguruses')->where('id', $id)->delete();
            unlink(public_path('assets/img/pengurus/') . $pengurus->foto);
        } else {
            $pengurus = DB::table('new_penguruses')->where('id', $id)->first();
            if (empty($pengurus)) {
                return redirect()->route('admin-pengurus', $tahunPeriode)->with('failed', 'gagal dihapus');
            }
            DB::table('new_penguruses')->where('id', $id)->delete();
            unlink(public_path("assets/img/pengurus/$tahunPeriode/") . $pengurus->foto);
        }

        // dd($pengurus->id);


        return redirect()->route('admin-pengurus', $tahunPeriode)->with('message', 'berhasil dihapus');
    }

    public function hapusDataPengurus($tahunPeriode)
    {
        if ($tahunPeriode == '2021') {
            DB::table('penguruses')->delete();
            $file = new Filesystem;
            $file->cleanDirectory(public_path('assets/img/pengurus/'));
        } else {
            DB::table('new_penguruses')->delete();
            $file = new Filesystem;
            $file->cleanDirectory(public_path("assets/img/pengurus/$tahunPeriode/"));
        }

        return redirect()->route('admin-pengurus', $tahunPeriode)->with('message', 'data berhasil dihapus');
    }

    public function akunAdmin()
    {
        $data['page'] = 'akun';

        return view('admin.akun.index', $data);
    }

    public function tambahAkunAdmin()
    {
        $data['page'] = 'akun';

        return view('admin.akun.tambah-akun', $data);
    }

    public function postTambahAkunAdmin(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $password = $request->password;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password)
        ]);

        $user->assignRole('admin');

        return redirect()->route('admin-akun')->with('message', 'akun berhasil ditambahkan');
    }

    public function akunSaya()
    {
        $data['page'] = 'akun-saya';

        return view('admin.akun.info-akun', $data);
    }

    public function ubahProfil()
    {
        $data['page'] = 'akun-saya';

        return view('admin.akun.ubah-profil', $data);
    }

    public function postUbahProfil(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5'
        ]);

        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['name' => $request->name]);
        return redirect()->route('akun-saya')->with('message', 'berhasil diubah');
    }

    public function ubahSandi()
    {
        $data['page'] = 'akun-saya';

        return view('admin.akun.ubah-sandi', $data);
    }

    public function postUbahSandi(Request $request)
    {
        $id = auth()->user()->id;

        $pl = $request->input('sandiLama');
        $pb = $request->input('password');
        $kpb = $request->input('password_confirmation');

        $request->validate([
            'sandiLama' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required'
        ]);


        if (!Hash::check($pl, auth()->user()->password)) {
            return redirect()->route('admin-ubah-sandi')->with('failed', 'kata sandi lama tidak sesuai !');
        } else {
            if ($pb != $kpb) {
                return redirect()->route('admin-ubah-sandi')->with('failed', 'kata sandi baru tidak sesuai !');
            } else {
                DB::table('users')->where('id', $id)
                    ->update([
                        'password' => Hash::make($request->input('password'))
                    ]);
                return redirect()->route('akun-saya')->with('message', 'kata sandi berhasil diubah...');
            }
        }
    }

    public function hapusAkun()
    {
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->delete();

        $this->middleware('role:admin')->except('logout');
        return redirect()->guest(route('login'));
        // return redirect()->route('keluar');
    }

    public function kritikSaran()
    {
        $data['page'] = 'kritik-saran';
        return view('admin.kritik-saran.index', $data);
    }

    public function mahasiswa()
    {
        $data['page'] = 'mahasiswa';
        return view('admin.mahasiswa.index', $data);
    }

    public function aktifkanAkunMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->status == 0) {
            DB::table('mahasiswas')->where('id', $id)
                ->update([
                    'status' => true
                ]);
        } else {
            return redirect()->route('admin-mahasiswa')->with('failed', 'status akun mahasiswa tersebut sudah aktif');
        }
        return redirect()->route('admin-mahasiswa')->with('message', 'status akun mahasiswa berhasil diaktifkan');
    }

    public function nonAktifkanAkunMahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa->status == 1) {
            DB::table('mahasiswas')->where('id', $id)
                ->update([
                    'status' => false
                ]);
        } else {
            return redirect()->route('admin-mahasiswa')->with('failed', 'status akun mahasiswa tersebut sudah non-aktif');
        }
        return redirect()->route('admin-mahasiswa')->with('message', 'status akun mahasiswa berhasil dinon-aktifkan');
    }

    public function hapusMahasiswaById($id)
    {
        $mahasiswa = DB::table('mahasiswas')->where('id', $id)->first();
        if (empty($mahasiswa)) {
            return redirect()->route('admin-mahasiswa')->with('failed', 'gagal dihapus');
        }
        DB::table('mahasiswas')->where('id', $id)->delete();
        unlink(public_path("assets/img/mahasiswa/$mahasiswa->angkatan/") . $mahasiswa->foto);
        return redirect()->route('admin-mahasiswa')->with('message', 'gagal dihapus');
    }



    public function tambahMahasiswa()
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
        return view('admin.mahasiswa.tambah-mahasiswa', $data);
    }

    public function postTambahMahasiswa(Request $request)
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
        $nama = \Illuminate\Support\Str::slug($request->nama, '-');

        $mahasiswa->nama = $nama;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;

        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $tanggal = $request->tanggal;

        $mahasiswa->tanggal_lahir = "$tanggal, $bulan, $tahun";

        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->asal = $request->asal;
        $mahasiswa->status = true;

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
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

        return redirect()->route('admin-mahasiswa')->with('message', 'mahasiswa berhasil disimpan');
    }

    public function editMahasiswaById($id)
    {
        $data['page'] = 'mahasiswa';
        $data['mahasiswa'] = Mahasiswa::find($id);

        $tahun_sekarang = date("Y");
        $tahunnn = array(2006);
        $tahun = 2007;

        while ($tahun <= $tahun_sekarang) {
            array_push($tahunnn,  $tahun);
            $tahun++;
        }
        $data['tahun'] = $tahunnn;

        $tahunnnLahir = array(1990);
        $tahunLahir = 1991;
        while ($tahunLahir <= $tahun_sekarang) {
            array_push($tahunnnLahir,  $tahunLahir);
            $tahunLahir++;
        }
        $data['tahunLahir'] = $tahunnnLahir;

        $bulanLahir = array(
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );

        $data['bulanLahir'] = $bulanLahir;

        $tanggalLahirrr = array(1);
        $tanggalLahir = 2;
        while ($tanggalLahir <= 31) {
            array_push($tanggalLahirrr,  $tanggalLahir);
            $tanggalLahir++;
        }
        $data['tanggalLahir'] = $tanggalLahirrr;


        return view('admin.mahasiswa.edit-mahasiswa', $data);
    }

    public function postEditEditMahasiswaById(Request $request, Mahasiswa $mahasiswa)
    {
        $nama = \Illuminate\Support\Str::slug($mahasiswa->nama, '-');
        $tahun = $request->tahun;

        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $tanggal = $request->tanggal;

        $tanggal_lahir = "$tanggal, $bulan, $tahun";

        if ($request->hasFile('gambar')) {
            if ($mahasiswa->foto && $mahasiswa->foto) {
                unlink(public_path("assets/img/mahasiswa/$mahasiswa->angkatan/") . $mahasiswa->foto);
            }
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $nama . '.' . $extensi;
                $file->move(public_path("assets/img/mahasiswa/$mahasiswa->angkatan/"), $fileName);

                // dd($mahasiswa->id);
                Mahasiswa::where('id', $mahasiswa->id)
                    ->update([
                        'nama' => $request->nama,
                        'tempat_lahir' =>  $request->tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'angkatan' => $request->angkatan,
                        'asal' => $request->asal,
                        'foto' => $fileName
                    ]);
            } else {
                return redirect()->route('admin-mahasiswa')->with('failed', 'File Tidak Valid');
            }
        } else {
            Mahasiswa::where('id', $mahasiswa->id)
                ->update([
                    'nama' => $request->nama,
                    'tempat_lahir' =>  $request->tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'angkatan' => $request->angkatan,
                    'asal' => $request->asal,
                ]);
        }
        return redirect()->route('admin-mahasiswa')->with('message', 'Data Mahasiswa Berhasil Diubah');
    }
}
