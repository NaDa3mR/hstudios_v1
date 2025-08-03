
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add New client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('client.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control"required>
                        </div>
                        <div class="col-12">
                            <label for="company_field" class="form-label">Company Field</label>
                            <input type="text" name="company_field" id="company_field" class="form-control">
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Client</button>
                </div>
            </form>
        </div>
    </div>
</div>

