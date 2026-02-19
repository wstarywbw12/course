<div class="modal fade" id="quizModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="quizForm">
            @csrf
            <input type="hidden" name="_method" id="quizMethod">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="quizModalTitle">Tambah Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul Quiz</label>
                        <input type="text" name="title" id="quiz_title"
                               class="form-control" required>
                    </div>

                     <div class="mb-3">
                        <label>Waktu</label>
                        <input type="number" name="time" id="quiz_time"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" id="quiz_description"
                                  class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
