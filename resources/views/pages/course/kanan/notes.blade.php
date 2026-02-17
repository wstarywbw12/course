<ul class="nav nav-pills nav-pills-materi mb-4 w-100" role="tablist">
    <li class="nav-item w-50">
        <button class="nav-link w-100 fw-semibold py-2 active"
            data-bs-toggle="pill" data-bs-target="#lesson">
            Lesson
        </button>
    </li>

    <li class="nav-item w-50">
        <button class="nav-link w-100 fw-semibold py-2"
            data-bs-toggle="pill" data-bs-target="#quiz">
            Quiz
        </button>
    </li>
</ul>


{{-- FORM CREATE NOTE --}}
<form action="{{ route('notes.store', $course) }}" method="POST">
    @csrf
    <textarea name="content"
        class="form-control notes-area"
        placeholder="Add notes..."
        style="height: 300px"></textarea>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary px-4">Save</button>
    </div>
</form>


{{-- LIST NOTES --}}
<div class="mt-4">
    <h6 class="fw-bold mb-3">Your Notes</h6>

    @forelse($notes as $note)
        <div class="row py-3 px-3 mb-2 align-items-center"
             style="background-color: rgb(236, 241, 252); border-radius: 10px;">

            <div class="col-10">
                {{ $note->content }}
                <div class="text-muted small mt-1">
                    {{ $note->created_at->diffForHumans() }}
                </div>
            </div>

            <div class="col-2 text-end">
                <form action="{{ route('notes.destroy', $note) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="text-muted">
            Belum ada catatan.
        </div>
    @endforelse
</div>
