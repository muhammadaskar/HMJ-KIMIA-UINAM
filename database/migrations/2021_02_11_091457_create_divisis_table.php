<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDivisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->mediumText('deskripsi');
            $table->string('logo');
            $table->timestamps();
        });

        DB::table('divisis')->insert([
            'nama' => 'Pengurus Harian',
            'slug' => 'pengurus-harian',
            'deskripsi' => '<div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Ketua Umum</strong> adalah jabatan tertinggi dari suatu organisasi yang merencanakan, mengkoordinir, menggerakkan, mengawasi jalannya organisasi, memberikan pokok-pokok pikiran yang merupakan strategi dan kebijakan HMJ- Kimia UIN Alauddin Makassar dalam rangka pelaksanaan program kerja maupun dalam menyikapi reformasi diseluruh tatanan kehidupan demi pencapaian cita-cita dan tujuan organisasi serta bertanggung jawab atas seluruh kegiatan organisasi.</p>
                <p class="text-justify"><strong>Wakil Ketua I</strong> bertanggung jawab atas semua kegiatan dan kepengurusan, membantu ketua umum dalam memimpin pengurus, menggantikan tugas serta posisi ketua umum pada saat ketua umum berhalangan dalam menjalankan tugas, ikut andil dalam setiap pengambilan dan bertanggung jawab terhadap keadaan ataupun hubungan internal didalam kampus.</p>
                <p class="text-justify"><strong>Wakil Ketua II</strong> bertanggung jawab membantu ketua umum dalam memimpin kepengurusan dan bertanggung jawab dalam hubungan eksternal HMJ-Kimia dan terhadap semua bentuk kegiatan eksternal yg di ikuti HMJ-Kimia.</p>
            </div>
        </div>
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Sekretaris</strong> bertanggung jawab menerima pendiktean, menyiapkan dalam surat menyurat, menerima tamu-tamu, memeriksa atau juga mengingatkan pimpinan mengenai kewajibannya yang sesuai atau pada perjanjiannya, dan melakukan banyak kewajiban yang lainnya dalam upaya meningkatkan efektifitas kerja pimpinan.</p>
                <p class="text-justify"><strong>Wakil sekretaris 1</strong> bertanggung jawab atas persuratan/administrasi secara internal. Wakil sekretaris bersama sekretaris umum mengawasi penyelenggaraan aktifitas organisasi dibidang administrasi dan bertanggung jawab mewakili sekretaris umum apabila berhalangan terutama untuk aktifitas kesekretariatan atau tata kerja organisasi.</p>
                <p class="text-justify"><strong>Wakil Sekretaris II</strong> memiliki tugas yaitu mewakili sekretaris umum dan wakil sekretaris I apabila berhalangan terutama untuk setiap aktifitas kesekretariatan dan tata kerja organisasi, bersama sekretaris umum mengawasi seluruh penyelenggaraan aktifitas organisasi di bidang administrasi dan tata kerja dan menghadiri rapat-rapat organisasi dan rapat lainnya serta bertanggung jawab terhadap persuratan/administrasi secara eksternal.</p>
            </div>
        </div>
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Bendahara Umum </strong>bertujuan untuk mengatur dan mengelola keuangan organisasi. Bendahara umum bertangggungjawab terhadap administrasi keuangan organisasi, mengelola dana secara efektif dan efisien, serta bersama ketua dan sekretaris merupakan tim kerja keuangan (TKK) atau otorisator keuangan ditubuh pengurus.</p>
                <p class="text-justify"><strong>Wakil bendahara Umum</strong> bertanggung jawab untuk mewakili bendahara apabila berhalangan hadir terutama untuk setiap aktivitas di bidang pengelolahan kekayaan dan keuangan organisasi, merumuskan dan mengusulkan segala peraturan organisasi tentang sistem pembukuan keuangan organisasi untuk menjadi kebijakan organisasi serta menyelenggarakan aktifitas pembukuan terhadap transaksi pengeluaran dan pemasukan keuangan secara rutin.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Keorganisasian dan Pengkaderan',
            'slug' => 'keorganisasian-dan-pengkaderan',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi Keorganisasian dan Pengkaderan </strong>merupakan divisi yang bertanggung jawab untuk mempersiapkan calon-calon regenerasi dan membentuk karakter individu-individu yang sesuai dengan visi dan misi 
                HMJ-Kimia untuk melanjutkan tongkat estafet perjuangan di organisasi. Karena, wujud dari keberlanjutan organisasi adalah munculnya kader-kader yang memiliki kapabilitas dan komitmen terhadap dinamika organisasi untuk masa depan.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Keilmuan',
            'slug' => 'keilmuan',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi keilmuan </strong>merupakan divisi yang berada pada ranah kerja yang mendukung akademik dan mengembangkan potensi diri bagi mahasiswa Kimia. Divisi Keilmuan HMJ-Kimia bertujuan untuk menumbuhkembangkan daya kreativitas yang tinggi, inovatif dan kompetitif. Serta memfasilitasi mahasiswa melalui wadah dan memberikan motivasi sebagai upaya pengembangan potensi ilmiah serta menjadi wadah dalam sharing ilmu kimia.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Kerohanian',
            'slug' => 'kerohanian',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi Kerohanian </strong>bertanggung jawab sebagai reminder bahwa dibalik hiruk-pikuk dan kesibukan duniawi terdapat alam sesungguhnya yang akan menanti kita, kami hadir sebagai pengingat akan Tupoksi kami sebagai manusia untuk senantiasa beribadah dalam segenap dimensi kehidupan kita.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Informasi dan Komunikasi',
            'slug' => 'informasi-dan-komunikasi',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi Informasi dan komunikasi (INFOKOM) </strong>bertanggung jawab menginformasikan dan mempublikasikan hal-hal yang telah dilakukan selama satu periode kepengurusan HMJ-Kimia yang dianggap baik untuk HMJ-Kimia, baik menginformasi kegiatan lembaga yang dilaksanakan oleh 
divisi-divisi HMJ-Kimia maupun kegiatan lainnya yang berhubungan dengan HMJ-Kimia itu sendiri, seperti kegiatan lomba yang telah diikuti dan informasi seputar, hari-hari perayaan dan hari-hari nasional yang dianggap penting.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Dana dan Usaha',
            'slug' => 'dana-dan-usaha',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi Dana dan Usaha </strong>adalah divisi yang bergerak pada bidang pendanaan dan usaha-usaha bisnis. Tujuan utama sendiri dari divisi dana dan usaha adalah mendirikan sebuah usaha dan memberikan sumbansi dana terhadap 
HMJ-KIMIA melalui berbagai kerja sama antar usaha serta membangun jiwa yang mampu memberikan pengalaman management dan pemasaran yang profesional kepada setiap orang.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

        DB::table('divisis')->insert([
            'nama' => 'Minat dan Bakat',
            'slug' => 'minat-dan-bakat',
            'deskripsi' => '
        <div class="card mb-1 shadow-sm">
            <div class="card-body">
                <p class="text-justify"><strong>Divisi Minat dan Bakat (MIKAT) </strong>merupakan divisi yang bergerak di bidang minat-bakat yang meliputi olahraga dan seni. Tujuan utama dari divisi ini adalah mewadahi dan memfasilitasi minat maupun bakat mahasiswa kimia dalam lingkungan HMJ-Kimia UINAM agar mampu meningkatkan kemampuan yang dimiliki di luar kegiatan akademik.</p>
            </div>
        </div>',
            'logo' => 'logo-hmj.png',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisis');
    }
}
