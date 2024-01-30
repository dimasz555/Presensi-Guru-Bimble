@extends('layouts.app')

@section('content')

<main id="main">
    <div class="container-fluid mx-3 my-3 p-3 bg-primary overflow-x-auto" style="margin-top: 10px; border-radius:10px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-7" style="color:white; font-size:1.5rem;">Pertemuan Hari Ini</h1>
            </div>
        </div>
    </div>

    <div class="container mt-4 mx-auto table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="text-sm-lg">Riwayat Presensi</h3>
            <!-- Tombol Tambah Data -->
            <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addAttendance" data-id="" data-gambar="" data-nama_program="" data-detail="">
                <span class="desktop-only">Tambah Presensi</span>
                <span class="mobile-only">
                    <i class="bi bi-plus-circle"></i>
                    Presensi
                </span>
            </button>
        </div>

        <!-- Tabel Responsif -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2022-01-01</td>
                        <td>Selesai</td>
                        <td>Jakarta</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- card modal -->
    <div class="modal fade" id="addAttendance" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h1 class="text-center mb-1" id="addNewCardTitle">Tambah Presensi</h1>
                    <!-- form -->
                    <form class="form row gy-1 gx-2 mt-75" method="post" action="" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="modalAddCardNumber">Tanggal</label>
                            <div class="input-group input-group-merge">
                                <input id="modalAddCardNumber" name="date" class="form-control add-credit-card-mask" type="date" placeholder="Masukkan Tanggal Presensi" />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="modalAddCardNumber">Status</label>
                            <select class="form-select" id="modalAddCardNumber" name="status">
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="modalAddCardNumber">Lokasi</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="text" name="gambar" id="gambar" />
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end card modal -->

</main>

<script>

</script>

@endsection