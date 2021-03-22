<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('beranda');

Route::get('/berita', 'MainController@berita')->name('berita');
Route::get('/berita/{slug}', 'MainController@detailBerita');

Route::get('/blog', 'MainController@blog')->name('blog');
Route::get('/blog/{slug}', 'MainController@detailBlog');


Route::get('/galeri', 'MainController@galeri')->name('galeri');
// Route::get('/pengurus/{pengurus}', 'MainController@getPengurus')->name('pengurus');
Route::get('/pengurus/{slug}', 'MainController@getPengurus')->name('pengurus');

Route::get('/tentang', 'MainController@tentang')->name('tentang');
Route::get('/kontak', 'MainController@kontak')->name('kontak');
Route::post('/kontak', 'MainController@kritikSaran')->name('kritik-saran.post');


// Auth::routes();
// Auth::routes(['register' => false]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin');

    // BERITA
    Route::get('/admin/berita', 'AdminController@berita')->name('admin-berita');
    Route::get('/admin/berita/{slug}', 'AdminController@detailBerita');
    Route::get('/admin/berita/edit/{id}', 'AdminController@editBerita');
    Route::put('/admin/berita/edit/{berita}', 'AdminController@postEditBerita')->name('post-edit-berita');
    Route::get('/admin/berita/hapus/{id}', 'AdminController@hapusBerita');

    Route::get('/admin/tambah-berita', 'AdminController@tambahBerita')->name('tambah-berita');
    Route::post('/admin/tambah-berita', 'AdminController@postTambahBerita')->name('post-tambah-berita');

    // END BERITA

    // BLOG
    Route::get('/admin/blog', 'AdminController@blog')->name('admin-blog');
    Route::get('/admin/tambah-blog', 'AdminController@tambahBlog')->name('tambah-blog');
    Route::post('/admin/tambah-blog', 'AdminController@postTambahBlog')->name('post-tambah-blog');

    Route::get('/admin/blog/{slug}', 'AdminController@detailBlog');
    Route::get('/admin/blog/edit/{id}', 'AdminController@editBlog');
    Route::put('/admin/blog/edit/{blog}', 'AdminController@postEditBlog');
    Route::get('/admin/blog/hapus/{id}', 'AdminController@hapusBlog');


    // GALERI
    Route::get('/admin/galeri', 'AdminController@galeri')->name('admin-galeri');
    Route::get('/admin/tambah-galeri', 'AdminController@tambahGaleri')->name('tambah-galeri');
    Route::post('/admin/tambah-galeri', 'AdminController@postTambahGaleri')->name('post-tambah-galeri');
    // END GALERI

    // PENGURUS
    Route::get('/admin/pengurus', 'AdminController@pengurus')->name('admin-pengurus');
    Route::get('/admin/tambah-pengurus', 'AdminController@tambahPengurus')->name('tambah-pengurus');
    Route::post('/admin/tambah-pengurus', 'AdminController@postTambahPengurus')->name('post-tambah-pengurus');
    Route::get('/admin/pengurus/edit/{id}', 'AdminController@editPengurus');
    Route::put('/admin/pengurus/edit/{pengurus}', 'AdminController@postEditPengurus');
    Route::get('/admin/pengurus/hapus/{id}', 'AdminController@hapusPengurus');
    Route::get('/admin/pengurus/hapus-pengurus', 'AdminController@hapusDataPengurus')->name('hapus-pengurus');
    // END PENGURUS

    // AKUN
    Route::get('/admin-akun', 'AdminController@akunAdmin')->name('admin-akun');
    Route::get('/admin-tambah-akun', 'AdminController@tambahAkunAdmin')->name('admin-tambah-akun');
    Route::post('/admin-tambah-akun', 'AdminController@postTambahAkunAdmin')->name('post-tambah-akun-admin');

    Route::get('/admin-akun-saya', 'AdminController@akunSaya')->name('akun-saya');
    Route::get('/admin-ubah-profil', 'AdminController@ubahProfil')->name('admin-ubah-profil');
    Route::put('/admin-ubah-profil', 'AdminController@postUbahProfil')->name('post-ubah-profil-admin');
    Route::get('/admin-ubah-sandi', 'AdminController@ubahSandi')->name('admin-ubah-sandi');
    Route::put('/admin-ubah-sandi', 'AdminController@postUbahSandi')->name('post-ubah-sandi-admin');
    Route::get('/admin-hapus-akun', 'AdminController@hapusAkun')->name('hapus-akun-admin');
    // END AKUN

    // KRITIK DAN SARAN
    Route::get('admin-kritik-saran', 'AdminController@kritikSaran')->name('admin-kritik-saran');
    // END KRITIK DAN SARAN

    Route::get('/keluar', 'AdminController@keluar')->name('keluar');
});
