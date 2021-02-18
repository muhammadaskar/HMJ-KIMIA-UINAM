<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6> --}}
                    <div class="float-right">
                        <a class="ml-2 btn btn-primary" href=" {{ route('admin-tambah-akun') }} "><i class="fas fa-plus"></i> Tambahkan Akun</a>
                    </div>
                    <input wire:model="cari" type="text" class="form-control mt-1" style="width:300px;" placeholder="Cari...">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat pada</th>
                                    <th>Diupdate pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th> {{ $user->name }} </th>
                                    <th> {{ $user->email }} </th>
                                    <th> <?= Carbon\Carbon::parse($user->created_at)->isoFormat('dddd, D MMMM Y'); ?> </th>
                                    <th> <?= Carbon\Carbon::parse($user->updated_at)->isoFormat('dddd, D MMMM Y'); ?> </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($users->isEmpty())
                        <div class="col-md-6 mx-auto d-block">
                            <div class="alert alert-danger text-center">
                                user tidak tersedia
                            </div>
                        </div>
                        @endif
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
