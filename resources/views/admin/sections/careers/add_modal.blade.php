
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add career </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('career.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="currency" class="form-label">Currency</label>
                            <select name="currency" id="currency" class="form-select" required>
                                <option value="" disabled selected>Select currency</option>
                                <option value="USD">USD - US Dollar</option>
                                <option value="EUR">EUR - Euro</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="" disabled selected>Select job type</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Internship">Internship</option>
                                <option value="Temporary">Temporary</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="experience_level" class="form-label">Level of experience</label>
                            <select name="experience_level" id="experience_level" class="form-select" required>
                                <option value="" disabled selected>Select level</option>
                                <option value="Entry">Entry</option>
                                <option value="Junior">Junior</option>
                                <option value="Mid">Mid</option>
                                <option value="Senior">Senior</option>
                                <option value="Lead">Lead</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="min_salary" class="form-label">Min salary</label>
                            <input type="text" name="min_salary" id="min_salary" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="max_salary" class="form-label">Max salary</label>
                            <input type="text" name="max_salary" id="max_salary" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Career</button>
                </div>
            </form>
        </div>
    </div>
</div>
