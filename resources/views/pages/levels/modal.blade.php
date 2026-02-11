<div class="modal fade" id="levelModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" id="levelForm">
            @csrf
            <input type="hidden" name="_method" id="formMethod">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Keterangan Level</label>
                        <input type="text" name="level" id="level"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Icon</label>
                        <input type="text" name="icon" id="icon"
                               class="form-control"
                               placeholder="contoh: fas fa-circle">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
