

<!-- modal.html -->
<div class="modal" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Update Slide</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="btn btn-light">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Input fields for updating information -->
                    <div class="form-group">
                        <label for="field1">Slide image</label>
                        <input type="file" name="img" class="form-control text-white" id="field1">
                    </div>
                    <div class="form-group">
                        <label for="field2">Slide name</label>
                        <input type="text" name="name" class="form-control text-white" id="field2" placeholder="Enter slide name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="save" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
