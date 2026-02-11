@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h5>Detail Course</h5>
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body d-flex justify-content-between ">

                <div>
                    <h4 class="fw-bold">{{ $course->title }}</h4>
                    <p class="text-muted">
                        {{ $course->description ?? '-' }}
                    </p>
                </div>

                <div class="mb-3">
                    <span class="badge bg-primary">
                        Level: {{ $course->level->level }}
                    </span>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Materi Course</h5>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#materiModal">
                            <i class="bi bi-eye"></i> Tambah Materi
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Materi</th>
                            <th>Type</th>
                            <th>content</th>
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pengantar UML</td>
                            <td>Video</td>
                            <td>https://youtu.be/EEbRdNuZASE?si=2LSPO6Kekj5lKnsK</td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="bi bi-eye"></i> Detail
                                </button>

                                <form id="delete-form-{{ $course->id }}" action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @include('pages.courses.style')
    @include('pages.courses.modal_detail')
    @include('pages.courses.modal_add_materi')
@endsection
