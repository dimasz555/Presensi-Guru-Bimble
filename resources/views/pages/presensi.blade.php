@extends('layouts.app')

@section('content')

<main id="main">
    <div class="container-fluid mx-3 my-3 p-3 bg-primary overflow-x-auto" style="margin-top: 10px; border-radius:10px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-7 my-auto" style="color:white; font-size:1.5rem;">Pertemuan Hari Ini</h1>
            </div>
        </div>
    </div>

    <div class="container mt-4 mx-3 table-container">
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
            <table id="tableAtt" class="table table-striped table-bordered dt-responsive nowrap mx-auto" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size:14px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Presensi</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th>keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendance as $at)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $at->attendance_at }}</td>
                        <td>{{ $at->status }}</td>
                        <td>{{ $at->location }}</td>
                        <td>{{ $at->detail }}</td>
                    </tr>
                    @empty
                    @endforelse
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
                    <h3 class="text-center mb-1" id="addNewCardTitle">Tambah Presensi</h3>
                    <!-- form -->
                    <form class="form row gy-1 gx-2 mt-75" method="POST" action="{{ route('add.presensi') }}">
                        @method('post')
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="attendance_at">Tanggal dan Waktu</label>
                            <div class="input-group input-group-merge">
                                <input id="attendance_at" name="attendance_at" class="form-control" type="datetime-local" required/>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" disabled selected>Select</option>
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="detail">Keterangan</label>
                            <textarea class="input-group input-group-merge" id="detail" name="detail" class="form-control add-credit-card-mask"></textarea>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="location">Lokasi</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="text" name="location" id="location" required/>
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
<!-- datatable js -->
<script src="{{ asset('plugin/jQuery-3.7.0/jquery-3.7.0.js') }}"></script>
<script src="{{ asset('plugin/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('plugin/pdfmake-0.2.7/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugin/pdfmake-0.2.7/vfs_fonts.js') }}"></script>


<script src="{{ asset('plugin/Buttons-2.4.2/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugin/Buttons-2.4.2/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugin/Buttons-2.4.2/js/buttons.print.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#tableAtt').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ],
            responsive: true,
        });
    });
</script>



@endsection