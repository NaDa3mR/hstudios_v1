
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Income Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('in-source.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Income Source</button>
                </div>
            </form>
        </div>
    </div>
</div>
