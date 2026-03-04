@extends('layouts.master_app')

@section('content')

{{-- ALERT --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('setting.profile.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
    <div class="col-12">
        <div class="card mb-3">
            <div class="card-body text-end">

                <button type="button" class="btn btn-warning" id="editBtn">
                    <i class="bx bx-edit"></i> Edit Mode
                </button>

                <button type="submit" class="btn btn-primary" id="saveBtn" style="display:none;">
                    <i class="bx bx-save"></i> Simpan Perubahan
                </button>

                <button type="button" class="btn btn-secondary" id="cancelBtn" style="display:none;">
                    <i class="bx bx-x"></i> Batal
                </button>

            </div>
        </div>
    </div>
</div>

{{-- PROFILE --}}
<div class="card mb-3">
    <div class="card-body">

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">name</label>
            <div class="col-sm-9">
                <input type="text" 
                       class="form-control" 
                       name="name" 
                       value="{{ auth()->user()->name }}" 
                       disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
                <input type="text" 
                       class="form-control" 
                       name="title" 
                       value="Beginer" 
                       disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" 
                       class="form-control" 
                       value="{{ auth()->user()->email }}" 
                       disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">

                @if(auth()->user()->foto)
                    <img src="{{ asset('public/storage/'.auth()->user()->foto) }}" 
                         width="100" 
                         class="rounded mb-2 d-block"
                         id="previewImage">
                @else
                    <img src="https://via.placeholder.com/100" 
                         width="100"
                         class="rounded mb-2 d-block"
                         id="previewImage">
                @endif

                <input type="file" 
                       name="foto" 
                       id="fotoInput"
                       class="form-control" 
                       accept="image/*" 
                       disabled>

            </div>
        </div>

    </div>
</div>

{{-- PASSWORD --}}
<div class="card">
    <div class="card-body">

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="password" 
                           name="password_lama" 
                           id="password_lama"
                           class="form-control"
                           disabled>
                    <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword('password_lama')">
                        👁
                    </span>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="password" 
                           name="password_baru" 
                           id="password_baru"
                           class="form-control"
                           disabled>
                    <span class="input-group-text" style="cursor:pointer;" onclick="togglePassword('password_baru')">
                        👁
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>

</form>

{{-- SCRIPT --}}
<script>

const editBtn = document.getElementById('editBtn');
const saveBtn = document.getElementById('saveBtn');
const cancelBtn = document.getElementById('cancelBtn');
const inputs = document.querySelectorAll('input');

editBtn.addEventListener('click', function () {
    inputs.forEach(input => input.disabled = false);
    editBtn.style.display = 'none';
    saveBtn.style.display = 'inline-block';
    cancelBtn.style.display = 'inline-block';
});

cancelBtn.addEventListener('click', function () {
    location.reload();
});

function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
}

// Preview Image
document.getElementById('fotoInput').addEventListener('change', function(event){
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('previewImage').src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
});

</script>

@endsection