<div class="modal fade" id="materiModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="materiForm">
            @csrf
            <input type="hidden" name="_method" id="materiMethod">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="materiModalTitle">Tambah Materi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul Materi</label>
                        <input type="text" name="title" id="materi_title"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Type</label>
                        <select name="type" id="materi_type" class="form-select">
                            <option value="video">Video</option>
                            <option value="text">Text</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Content (URL / Text)</label>
                        <textarea name="content" id="materi_content"
                                  class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
