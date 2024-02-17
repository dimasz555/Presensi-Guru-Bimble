@extends('layouts.app')

@section('content')

<main id="main">
    <div class="container-fluid mx-3 my-3 p-3 overflow-x-auto" style="margin-top: 10px; border-radius:10px; background-color: #146C94;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-7 my-auto" style="color:white; font-size:1.5rem;">Profil Guru</h1>
            </div>
        </div>
    </div>
    <div class="container mt-4 mx-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow"> <!-- Menambahkan kelas shadow -->
                    <div class="card-body">
                        <div class="col-md-6 text-center mx-auto position-relative">
                            <!-- Avatar (lingkaran) -->
                            <div style="position: relative; display: inline-block;">
                                @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar" class="img-fluid rounded-circle mb-3 border border-dark" style="width: 130px; height: 130px; max-width: 130px; max-height: 130px;">
                                @else
                                <img src="{{ asset('assets/img/Default-User.png') }}" alt="Default Avatar" class="img-fluid rounded-circle mb-3 border border-dark" style="width: 100px; height: 100px; max-width: 100px; max-height: 100px;">
                                @endif

                                <!-- Icon Edit -->
                                <a href="#" class="position-absolute bottom-0 end-0 translate-middle mb-2" style="width: 30px; height: 30px; background-color: #0D6EFD; border-radius: 50%; text-align: center; line-height: 30px; margin-right: -15px;" data-bs-toggle="modal" data-bs-target="#updateAvatarModal">
                                    <i class="bi bi-pencil-fill text-white" style="font-size: 13px;"></i>
                                </a>
                            </div>
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editpassword">Ubah Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Modal Update Password -->
    <div class="modal fade" id="editpassword" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-sm-5 mx-50 pb-5">
                    <h3 class="text-center mb-1" id="addNewCardTitle">Ubah Password</h3>
                    <!-- form -->
                    <form id="editpasswordForm" class="form row gy-1 gx-2 mt-75" method="POST" action="{{ route('update.password') }}">
                        @method('post')
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="old_password">Password Lama</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="old_password" required />
                                @error('old_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="password">Password Baru</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" required />
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="password_confirmation">Konfirmasi Password Baru</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required />
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-1 mt-1" onclick="event.preventDefault(); submitForm();">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Card Modal Update Password -->

    <!-- Modal Update Avatar -->
    <div class="modal fade" id="updateAvatarModal" tabindex="-1" aria-labelledby="updateAvatarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAvatarModalLabel">Update Foto Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update.avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Choose Photo (max : 2mb)</label>
                            <input class="form-control" type="file" id="avatar" name="avatar" onchange="previewImage()">
                        </div>
                        <div class="mb-3">
                            <img id="avatarPreview" src="#" alt="" style="max-width: 100%; max-height: 200px; display: none;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Update Avatar -->
</main>

@if($errors->any())
<script>
    window.onload = function() {
        let modal = new bootstrap.Modal(document.getElementById('editpassword'));
        modal.show();
    };
</script>
@endif

<script>
    function submitForm() {
        let form = document.getElementById('editpasswordForm');
        form.submit();
    }
</script>

<script>
    function previewImage() {
        var avatarInput = document.getElementById('avatar');
        var avatarPreview = document.getElementById('avatarPreview');
        var file = avatarInput.files[0];

        if (file) {
            avatarPreview.style.display = 'block';
            var reader = new FileReader();
            reader.onload = function(e) {
                avatarPreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            avatarPreview.style.display = 'none';
            avatarPreview.src = ''; // Menghapus src atribut agar tidak ada gambar yang ditampilkan
        }
    }
</script>


@endsection