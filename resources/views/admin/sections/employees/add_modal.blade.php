
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add employee </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="job" class="form-label">Job</label>
                            <input type="text" name="job" id="job" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="text" name="github" id="github" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="behance" class="form-label">Behance</label>
                            <input type="text" name="behance" id="behance" class="form-control">
                        </div>
                        <div class="col-12">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" name="salary" id="salary" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                accept="image/*">
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
