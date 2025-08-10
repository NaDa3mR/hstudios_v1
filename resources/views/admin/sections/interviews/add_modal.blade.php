<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Interview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('interview.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Career -->
                        <div class="col-12">
                            <label class="form-label">Career</label>
                            <select id="career_add" name="career_id" class="form-select">
                                <option value="" disabled selected>Select Career</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Candidate -->
                        <div class="col-12">
                            <label class="form-label">Select Candidate</label>
                            <select id="candidate_add" name="candidate_id" class="form-select">
                                <option value="" disabled selected>Select Candidate</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="type" class="form-label">Type</label>
                            <select id="type" name="type" class="form-select" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="interview_date" class="form-label">Interview Date</label>
                            <input type="date" name="interview_date" id="interview_date" class="form-control"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" name="duration" id="duration" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Add Interview</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
