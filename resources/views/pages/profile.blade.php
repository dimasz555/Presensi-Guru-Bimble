@extends('layouts.app')

@section('content')

<main id="main">
    <div class="container-fluid mx-3 my-3 p-3 bg-primary overflow-x-auto" style="margin-top: 10px; border-radius:10px;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-7" style="color:white; font-size:1.5rem;">Profil Guru</h1>
            </div>
        </div>
    </div>
    <div class="container mt-4 mx-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-6 text-center mx-auto">
                            <!-- Avatar (lingkaran) -->
                            <img src="{{ asset('assets/img/Default-User.png') }}" alt="Avatar" class="img-fluid rounded-circle mb-3 border border-dark" width="150">
                        </div>
                        <form>
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" disabled value="{{ Auth::user()->name }}">
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="mb-3">
                                <label for="selectGender" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" name="gender" id="gender" disabled value="{{ Auth::user()->gender }}">
                            </div>

                            <!-- Pendidikan -->
                            <div class="mb-3">
                                <label for="selectEducation" class="form-label">Pendidikan Terakhir</label>
                                <input type="text" class="form-control" name="last_education" id="last_education" disabled value="{{ Auth::user()->last_education }}">
                            </div>

                            <!-- Jurusan -->
                            <div class="mb-3">
                                <label for="inputJurusan" class="form-label">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" disabled value="{{ Auth::user()->jurusan }}">
                            </div>


                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpassword" data-id="" data-gambar="" data-nama_program="" data-detail="">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection