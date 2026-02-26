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

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{ route('setting.beranda.update') }}" method="POST" enctype="multipart/form-data" id="settingForm">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-xxl-9">
            <!-- Tombol Edit dan Save -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-warning" id="editBtn">
                            <i class="bx bx-edit"></i> Edit Mode
                        </button>
                        <button type="submit" class="btn btn-primary" id="saveBtn" style="display: none;">
                            <i class="bx bx-save"></i> Simpan Perubahan
                        </button>
                        <button type="button" class="btn btn-secondary" id="cancelBtn" style="display: none;">
                            <i class="bx bx-x"></i> Batal
                        </button>
                    </div>
                </div>
            </div>

            {{-- hero section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Hero Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="hero_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="hero_title" class="form-control @error('hero_title') is-invalid @enderror" id="hero_title" rows="3" readonly>{{ old('hero_title', $beranda->hero_title) }}</textarea>
                            @else
                                <textarea name="hero_title" class="form-control" id="hero_title" rows="3" readonly></textarea>
                            @endif
                            @error('hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="hero_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="hero_sub_title" class="form-control @error('hero_sub_title') is-invalid @enderror" id="hero_sub_title" rows="3" readonly>{{ old('hero_sub_title', $beranda->hero_sub_title) }}</textarea>
                            @else
                                <textarea name="hero_sub_title" class="form-control" id="hero_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('hero_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="hero_image" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            @if($beranda && $beranda->hero_image)
                                <div class="mb-2">
                                    <img src="{{ asset('public/storage/' . $beranda->hero_image) }}" alt="Hero Image" height="80" class="rounded" />
                                </div>
                            @endif
                            <input type="file" name="hero_image" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" accept="image/*" disabled>
                            @error('hero_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                        <label for="about_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="about_title" class="form-control @error('about_title') is-invalid @enderror" id="about_title" rows="3" readonly>{{ old('about_title', $beranda->about_title) }}</textarea>
                            @else
                                <textarea name="about_title" class="form-control" id="about_title" rows="3" readonly></textarea>
                            @endif
                            @error('about_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="about_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="about_sub_title" class="form-control @error('about_sub_title') is-invalid @enderror" id="about_sub_title" rows="3" readonly>{{ old('about_sub_title', $beranda->about_sub_title) }}</textarea>
                            @else
                                <textarea name="about_sub_title" class="form-control" id="about_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('about_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- material section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Material Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="material_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="material_title" class="form-control @error('material_title') is-invalid @enderror" id="material_title" rows="3" readonly>{{ old('material_title', $beranda->material_title) }}</textarea>
                            @else
                                <textarea name="material_title" class="form-control" id="material_title" rows="3" readonly></textarea>
                            @endif
                            @error('material_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="material_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="material_sub_title" class="form-control @error('material_sub_title') is-invalid @enderror" id="material_sub_title" rows="3" readonly>{{ old('material_sub_title', $beranda->material_sub_title) }}</textarea>
                            @else
                                <textarea name="material_sub_title" class="form-control" id="material_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('material_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- feature section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Feature Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="feature_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="feature_title" class="form-control @error('feature_title') is-invalid @enderror" id="feature_title" rows="3" readonly>{{ old('feature_title', $beranda->feature_title) }}</textarea>
                            @else
                                <textarea name="feature_title" class="form-control" id="feature_title" rows="3" readonly></textarea>
                            @endif
                            @error('feature_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="feature_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="feature_sub_title" class="form-control @error('feature_sub_title') is-invalid @enderror" id="feature_sub_title" rows="3" readonly>{{ old('feature_sub_title', $beranda->feature_sub_title) }}</textarea>
                            @else
                                <textarea name="feature_sub_title" class="form-control" id="feature_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('feature_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="feature_image" class="col-sm-3 col-form-label">Image</label>
                        <div class="col-sm-9">
                            @if($beranda && $beranda->feature_image)
                                <div class="mb-2">
                                    <img src="{{ asset('public/storage/' . $beranda->feature_image) }}" alt="Feature Image" height="80" class="rounded" />
                                </div>
                            @endif
                            <input type="file" name="feature_image" class="form-control @error('feature_image') is-invalid @enderror" id="feature_image" accept="image/*" disabled>
                            @error('feature_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- testimonial section --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Testimonial Section</h4>
                </div>
                <div class="card-body">
                    <div class="mb-1 row">
                        <label for="testimonial_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="testimonial_title" class="form-control @error('testimonial_title') is-invalid @enderror" id="testimonial_title" rows="3" readonly>{{ old('testimonial_title', $beranda->testimonial_title) }}</textarea>
                            @else
                                <textarea name="testimonial_title" class="form-control" id="testimonial_title" rows="3" readonly></textarea>
                            @endif
                            @error('testimonial_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="testimonial_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="testimonial_sub_title" class="form-control @error('testimonial_sub_title') is-invalid @enderror" id="testimonial_sub_title" rows="3" readonly>{{ old('testimonial_sub_title', $beranda->testimonial_sub_title) }}</textarea>
                            @else
                                <textarea name="testimonial_sub_title" class="form-control" id="testimonial_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('testimonial_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                        <label for="cta_title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="cta_title" class="form-control @error('cta_title') is-invalid @enderror" id="cta_title" rows="3" readonly>{{ old('cta_title', $beranda->cta_title) }}</textarea>
                            @else
                                <textarea name="cta_title" class="form-control" id="cta_title" rows="3" readonly></textarea>
                            @endif
                            @error('cta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="cta_sub_title" class="col-sm-3 col-form-label">Sub title</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="cta_sub_title" class="form-control @error('cta_sub_title') is-invalid @enderror" id="cta_sub_title" rows="3" readonly>{{ old('cta_sub_title', $beranda->cta_sub_title) }}</textarea>
                            @else
                                <textarea name="cta_sub_title" class="form-control" id="cta_sub_title" rows="3" readonly></textarea>
                            @endif
                            @error('cta_sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                        <label for="footer_about" class="col-sm-3 col-form-label">About</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <textarea name="footer_about" class="form-control @error('footer_about') is-invalid @enderror" id="footer_about" rows="3" readonly>{{ old('footer_about', $beranda->footer_about) }}</textarea>
                            @else
                                <textarea name="footer_about" class="form-control" id="footer_about" rows="3" readonly></textarea>
                            @endif
                            @error('footer_about')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="footer_hp" class="col-sm-3 col-form-label">No.HP</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <input name="footer_hp" value="{{ old('footer_hp', $beranda->footer_hp) }}" class="form-control @error('footer_hp') is-invalid @enderror" id="footer_hp" readonly>
                            @else
                                <input name="footer_hp" class="form-control" id="footer_hp" readonly>
                            @endif
                            @error('footer_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="footer_email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <input name="footer_email" value="{{ old('footer_email', $beranda->footer_email) }}" class="form-control @error('footer_email') is-invalid @enderror" id="footer_email" readonly>
                            @else
                                <input name="footer_email" class="form-control" id="footer_email" readonly>
                            @endif
                            @error('footer_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="footer_website" class="col-sm-3 col-form-label">Website</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <input name="footer_website" value="{{ old('footer_website', $beranda->footer_website) }}" class="form-control @error('footer_website') is-invalid @enderror" id="footer_website" readonly>
                            @else
                                <input name="footer_website" class="form-control" id="footer_website" readonly>
                            @endif
                            @error('footer_website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="footer_cp" class="col-sm-3 col-form-label">Copy Right</label>
                        <div class="col-sm-9">
                            @if($beranda)
                                <input name="footer_cp" value="{{ old('footer_cp', $beranda->footer_cp) }}" class="form-control @error('footer_cp') is-invalid @enderror" id="footer_cp" readonly>
                            @else
                                <input name="footer_cp" class="form-control" id="footer_cp" readonly>
                            @endif
                            @error('footer_cp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    $(document).ready(function() {
        // Edit mode functionality
        $('#editBtn').click(function() {
            // Enable all form inputs
            $('input, textarea').prop('readonly', false).prop('disabled', false);
            
            // Hide edit button, show save and cancel buttons
            $(this).hide();
            $('#saveBtn, #cancelBtn').show();
        });

        $('#cancelBtn').click(function() {
            // Disable all form inputs
            $('input, textarea').prop('readonly', true).prop('disabled', true);
            
            // Reset form to original values (reload page)
            location.reload();
        });

        // Form submission
        $('#saveBtn').click(function() {
            $('#settingForm').submit();
        });
    });
</script>
@endpush

@endsection