<div class="modal fade" id="importkajian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Kajian Islami</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('importkajian.index') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Upload File<span
                            style="color: red">*</span></label>
                    <input type="file" class="form-control" name="file" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
