<div class="modal fade" id="updatemodel{{ $interview->id }}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Interview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{ route('interview.update', $interview->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- Career -->
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $interview->id }}">

                        <!-- Career -->
                        <div class="col-12">
                            <label class="form-label">Career</label>
                            <select id="career_edit{{ $interview->id }}" name="career_id" class="form-select">
                                <option value="" disabled>Select Career</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}"
                                        {{ $interview->candidate && $interview->candidate->career_id == $career->id ? 'selected' : '' }}>
                                        {{ $career->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Candidate -->
                        <div class="col-12">
                            <label class="form-label">Select Candidate</label>
                            <select id="candidate_edit{{ $interview->id }}" name="candidate_id" class="form-select">
                                <option value="" disabled>Select Candidate</option>
                                @foreach ($candidates as $candidate)
                                    <option value="{{ $candidate->id }}"
                                        {{ $interview->candidate_id == $candidate->id ? 'selected' : '' }}>
                                        {{ $candidate->first_name }} {{ $candidate->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type -->
                        <div class="col-12">
                            <label for="type{{ $interview->id }}" class="form-label">Type</label>
                            <input type="text" name="type" id="type{{ $interview->id }}" class="form-control"
                                value="{{ $interview->type }}" required>
                        </div>

                        <!-- Interview Date -->
                        <div class="col-12">
                            <label for="interview_date{{ $interview->id }}" class="form-label">Interview Date</label>
                            <input type="date" name="interview_date" id="interview_date{{ $interview->id }}"
                                class="form-control" value="{{ $interview->interview_date }}" required>
                        </div>

                        <!-- Duration -->
                        <div class="col-12">
                            <label for="duration{{ $interview->id }}" class="form-label">Duration</label>
                            <input type="text" name="duration" id="duration{{ $interview->id }}"
                                class="form-control" value="{{ $interview->duration }}" required>
                        </div>

                        <!-- Details -->
                        <div class="col-12">
                            <label for="details{{ $interview->id }}" class="form-label">Details</label>
                            <input type="text" name="details" id="details{{ $interview->id }}" class="form-control"
                                value="{{ $interview->details }}" required>
                        </div>

                    </div><!--end row-->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Interview</button>
                </div>
            </form>
        </div>
    </div>
</div>
