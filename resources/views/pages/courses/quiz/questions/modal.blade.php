<div class="modal fade" id="questionModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="POST" id="questionForm">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Soal Quiz</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label>Pertanyaan</label>
                    <textarea name="question" id="questionText"
                        class="form-control" required></textarea>
                </div>

                @for ($i = 0; $i < 4; $i++)
                    <div class="input-group mb-2">
                        <span class="input-group-text">
                            <input type="radio"
                                   name="correct_option"
                                   value="{{ $i }}"
                                   class="correct-radio">
                        </span>
                        <input type="text"
                               name="options[{{ $i }}][text]"
                               class="form-control option-input"
                               placeholder="Pilihan {{ $i+1 }}">
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
