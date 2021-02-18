<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Blog;
use App\Galeri;
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

    public function pengurus()
    {
        $data['page'] = 'pengurus';

        return view('admin.pengurus.index', $data);
    }

    public function tambahPengurus()
    {
        $data['page'] = 'pengurus';

        return view('admin.pengurus.tambah-pengurus', $data);
    }

    public function postTambahPengurus(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);

        $pengurus = new Pengurus();

        $divisi = $request->input('divisi');

        $pengurus->nama = $request->input('nama');
        $pengurus->divisi = $request->input('divisi');
        $pengurus->jabatan = $request->input('jabatan');

        $nama = \Illuminate\Support\Str::slug($pengurus->nama, '-');

        if ($request->hasFile('gambar')) {
            // tambahkan isVlid method
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $nama . '.' . $extensi;
                $file->move(public_path("assets/img/pengurus/"), $fileName);
                $pengurus->foto = $fileName;
            } else {
                return redirect()->back()->with('failed', 'ukuran file terlalu besar');
            }
        } else {
            return redirect()->back()->with('failed', 'gagal menambahkan');
        }

        $pengurus->save();

        return redirect()->route('admin-pengurus')->with('message', 'pengurus berhasil disimpan');
    }

    public function editPengurus($id)
    {
        $data['page'] = 'pengurus';
        $data['pengurus'] = Pengurus::find($id);

        return view('admin.pengurus.edit-pengurus', $data);
    }

    public function postEditPengurus(Request $request, Pengurus $pengurus)
    {

        $nama = \Illuminate\Support\Str::slug($pengurus->nama, '-');

        if ($request->hasFile('gambar')) {
            if ($pengurus->foto && $request->foto) {
                unlink(public_path("assets/img/pengurus/") . $pengurus->foto);
            }
            if ($request->file('gambar')->isValid()) {
                $file = $request->file('gambar');
                $extensi = $file->getClientOriginalExtension();
                $fileName = time() . '-' . $nama . '.' . $extensi;
                $file->move(public_path("assets/img/pengurus/"), $fileName);
                Pengurus::where('id', $pengurus->id)
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
            Pengurus::where('id', $pengurus->id)
                ->update([
                    'nama' => $request->nama,
                    'divisi' =>  $request->divisi,
                    'jabatan' => $request->jabatan
                ]);
        }
        return redirect()->route('admin-pengurus')->with('message', 'pengurus Berhasil Diubah');
    }

    public function hapusPengurus($id)
    {
        $pengurus = DB::table('penguruses')->where('id', $id)->first();

        // dd($pengurus->id);

        if (empty($pengurus)) {
            return redirect()->route('admin-pengurus')->with('failed', 'gagal dihapus');
        }

        DB::table('penguruses')->where('id', $id)->delete();
        unlink(public_path('assets/img/pengurus/') . $pengurus->foto);

        return redirect()->route('admin-pengurus')->with('message', 'berhasil dihapus');
    }

    public function hapusDataPengurus()
    {

        DB::table('penguruses')->delete();
        $file = new Filesystem;
        $file->cleanDirectory(public_path('assets/img/pengurus/'));

        return redirect()->route('admin-pengurus')->with('message', 'data berhasil dihapus');
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
}
