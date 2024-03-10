@extends('layouts.admin.app')


@section('content')


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kelola Guru</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Kelola Presensi Guru</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Data Guru</h5>
        </div>

        <div class="table-responsive">
            <table id="tableGuru" class="table table-striped table-bordered dt-responsive nowrap mx-auto" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size:14px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($guru as $gr)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gr->name }}</td>
                        <td>{{ $gr->username }}</td>
                        <td>{{ $gr->phone }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuru" style="width: 150px;">
                                <span class="add">
                                    <i class="bi bi-eye"></i>
                                    Lihat Presensi
                                </span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- card viewGuru modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h3 class="text-center mb-1" id="addNewCardTitle">Profil Guru</h3>
                    <!-- form -->
                    <form class="form row gy-1 gx-2 mt-75">
                        <div class="col-12">
                            <label class="form-label" for="name">Nama</label>
                            <div class="input-group input-group-merge">
                                <input id="name" name="name" class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="username">Username</label>
                            <div class="input-group input-group-merge">
                                <input id="username" name="username" class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="gender">Jenis Kelamin</label>
                            <div class="input-group input-group-merge">
                                <input id="gender" name="gender" class="form-control" type="text" disabled />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="phone">Nomor Telepon</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="number" name="phone" id="phone" disabled />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="last_education">Pendidikan Terakhir</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="text" name="last_education" id="last_education" disabled />
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="jurusan">Jurusan</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="text" name="jurusan" id="jurusan" disabled />
                            </div>
                        </div>

                        <div class="col-12 text-center">
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

</main><!-- End #main -->

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
        $('#tableGuru').DataTable({
            responsive: true,
            info: false,
            "language": {
                "paginate": {
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "search": "Pencarian :",
                "emptyTable": "Tidak ada data",
                "zeroRecords": "Tidak ada data",
                "lengthMenu": "Menampilkan _MENU_ data per halaman",
            }
        });
    });
</script>

<script>
    $('#viewModal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name')
        var username = button.data('username')
        var gender = button.data('gender')
        var phone = button.data('phone')
        var last_education = button.data('last_education')
        var jurusan = button.data('jurusan')

        var modal = $(this)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #username').val(username)
        modal.find('.modal-body #gender').val(gender)
        modal.find('.modal-body #phone').val(phone)
        modal.find('.modal-body #last_education').val(last_education)
        modal.find('.modal-body #jurusan').val(jurusan)

    })
</script>


@endsection