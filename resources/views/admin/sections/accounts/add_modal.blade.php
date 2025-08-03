
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('account.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="text" name="balance" id="balance" class="form-control"  required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
