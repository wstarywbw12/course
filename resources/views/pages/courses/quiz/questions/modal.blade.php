<div class="modal fade" id="questionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="questionForm" onsubmit="syncEditors()">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Soal Quiz</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <label class="fw-bold mb-2">Pertanyaan</label>
                    <textarea name="question" id="questionEditor"></textarea>
                    <hr>

                    @for ($i = 0; $i < 4; $i++)
                        @php
                            $label = chr(65 + $i); // A, B, C, D
                        @endphp
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-1">
                                <input type="radio" name="correct_option" value="{{ $i }}"
                                    class="correct-radio me-2">
                                <strong>Pilihan {{ $label }}</strong>
                            </div>

                            <textarea name="options[{{ $i }}][text]" class="option-editor" data-index="{{ $i }}"></textarea>

                        </div>
                    @endfor
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
