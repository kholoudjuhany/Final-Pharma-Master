<div class="modal fade" id="categoryExistsModal" tabindex="-1" aria-labelledby="categoryExistsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryExistsModalLabel">Category Already Exists</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                The category you are trying to add already exists. Please choose a different name.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Script to Show the Modal -->
@if (session('error'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('categoryExistsModal'));
        myModal.show();
    </script>
@endif