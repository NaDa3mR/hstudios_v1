<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Candidate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
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
                            <label class="form-label">Career</label>
                            <select id="career" name="career_id" class="form-select">
                                <option value="" disabled selected>Select Career</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country" class="form-select" required>
                                <option value="" disabled selected>Select country</option>
                                <option value="Egypt">Egypt</option>
                                <option value="United States">United States</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="Canada">Canada</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="city" class="form-label">City</label>
                            <select name="city" id="city" class="form-select" required>
                                <option value="" disabled selected>Select city</option>
                            </select>
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
                            <input type="text" name="behance" id="behance" class="form-control" required>
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-12">
                            <label for="cv" class="form-label">CV</label>
                            <input type="file" name="cv" id="cv" class="form-control"
                                accept=".pdf,.doc,.docx">
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Candidate</button>
                </div>
            </form>
        </div>
    </div>
</div>
