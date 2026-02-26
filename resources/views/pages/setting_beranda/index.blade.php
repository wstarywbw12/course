@extends('layouts.master_app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Setting</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>
                        <li class="breadcrumb-item active">Beranda</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-9">

            {{-- hero section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Hero Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3"> Belajar UML Lebih Mudah dan Interaktif</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Platform pembelajaran UML online untuk mahasiswa dan profesional IT. Dilengkapi quiz, evaluasi, dan sertifikat. </textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="public/assets/images/small/img-4.jpg" alt="cc" height="80" class="rounded" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- about section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">About Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Apa itu UMLAB?</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">UMLAB adalah platform pembelajaran online yang menyediakan materi UML lengkap mulai dari dasar hingga lanjutan, disertai quiz interaktif dan evaluasi hasil belajar. </textarea>
                        </div>
                    </div>
                </div>
            </div>


            {{-- about list --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">About List</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="4%" class="text-end">No.</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th width="15%" class="text-center"><i class="bx bx-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="4%" class="text-center">1</td>
                                <td>fas fa edti</td>
                                <td>Materi Terstruktur</td>
                                <td>Kurikulum bertahap dari dasar hingga mahir, cocok untuk pemula.</td>
                                <td width="15%" class="text-end">
                                    <button class="btn btn-info btn-sm mr-1 align-middle">
                                        <i class="bx bxs-edit align-middle"></i> Ubah
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger  btn-delete" data-url="">
                                        <i class="bx bx-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- material section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Material Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Kurikulum Kelas</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Akses lengkap materi UML dari dasar hingga lanjutan. Disusun sistematis agar mudah dipahami baik untuk mahasiswa maupun profesional IT. </textarea>
                        </div>
                    </div>
                </div>
            </div>
             {{-- material list --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Material List</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="4%" class="text-end">No.</th>
                                <th>Title</th>
                                <th width="15%" class="text-center"><i class="bx bx-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="4%" class="text-center">1</td>
                                <td>Use Case Diagram – Interaksi aktor dengan sistem</td>
                                <td width="15%" class="text-end">
                                    <button class="btn btn-info btn-sm mr-1 align-middle">
                                        <i class="bx bxs-edit align-middle"></i> Ubah
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger  btn-delete" data-url="">
                                        <i class="bx bx-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- feature section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Feature Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Fitur Unggulan</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Semua alat untuk mendukung perjalanan belajarmu. </textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="jabatan" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="public/assets/images/small/img-4.jpg" alt="cc" height="80"
                                class="rounded" />
                        </div>
                    </div>
                </div>
            </div>

              {{-- feature list --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Feature List</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th width="4%" class="text-end">No.</th>
                                <th>Icon</th>
                                <th>Title</th>
                                <th width="15%" class="text-center"><i class="bx bx-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="4%" class="text-center">1</td>
                                <td>fas fa edti</td>
                                <td>Sistem Quiz Online & Nilai Otomatis</td>
                                <td width="15%" class="text-end">
                                    <button class="btn btn-info btn-sm mr-1 align-middle">
                                        <i class="bx bxs-edit align-middle"></i> Ubah
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger  btn-delete" data-url="">
                                        <i class="bx bx-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            {{-- testimonial section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Testimonial Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Testimoni Mahasiswa</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Apa kata mereka setelah belajar di UMLAB </textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- cta section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">CTA Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Siap Menguasai UML?</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Gabung sekarang dan akses semua materi, kuis, dan sertifikat. </textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- footer section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Footer Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">UMLAB</textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nik" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            <textarea type="text" readonly class="form-control" id="nik" rows="3">Platform pembelajaran UML online dengan pendekatan interaktif, dilengkapi quiz dan evaluasi untuk mahasiswa dan profesional.. </textarea>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="whatsapp" class="col-sm-3 col-form-label">No.HP</label>
                        <div class="col-sm-9">
                            <input readonly value="08126534212" class="form-control" id="whatsapp">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input readonly class="form-control" id="staticEmail" value="email@example.com">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="website" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                            <input readonly value="course-umlab.id" class="form-control" id="website">
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="cp" class="col-sm-3 col-form-label">Copy Right</label>
                        <div class="col-sm-9">
                            <input readonly value="© 2025 UMLAB. All rights reserved." class="form-control"
                                id="cp">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
