<div class="modal fade" id="updatemodel{{$career->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('career.update', $career->id)}}">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$career->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $career->id }}">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $career->title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="currency" class="form-label">Currency</label>
                            <select name="currency" id="currency" class="form-select" required>
                                <option value="" disabled>Select currency</option>
                                <option value="USD" {{ old('currency', $career->currency) == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                                <option value="EUR" {{ old('currency', $career->currency) == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                                <option value="EGP" {{ old('currency', $career->currency) == 'EGP' ? 'selected' : '' }}>EGP - Egyptian Pound</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="" disabled>Select job type</option>
                                <option value="Full-time" {{ old('type', $career->type) == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ old('type', $career->type) == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Freelance" {{ old('type', $career->type) == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                                <option value="Internship" {{ old('type', $career->type) == 'Internship' ? 'selected' : '' }}>Internship</option>
                                <option value="Temporary" {{ old('type', $career->type) == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="experience_level" class="form-label">Level of experience</label>
                            <select name="experience_level" id="experience_level" class="form-select" required>
                                <option value="" disabled>Select level</option>
                                <option value="Entry" {{ old('experience_level', $career->experience_level) == 'Entry' ? 'selected' : '' }}>Entry</option>
                                <option value="Junior" {{ old('experience_level', $career->experience_level) == 'Junior' ? 'selected' : '' }}>Junior</option>
                                <option value="Mid" {{ old('experience_level', $career->experience_level) == 'Mid' ? 'selected' : '' }}>Mid</option>
                                <option value="Senior" {{ old('experience_level', $career->experience_level) == 'Senior' ? 'selected' : '' }}>Senior</option>
                                <option value="Lead" {{ old('experience_level', $career->experience_level) == 'Lead' ? 'selected' : '' }}>Lead</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="min_salary" class="form-label">Min salary</label>
                            <input type="text" name="min_salary" id="min_salary" class="form-control" value="{{ $career->min_salary }}" required>
                        </div>
                        <div class="col-12">
                            <label for="max_salary" class="form-label">Max salary</label>
                            <input type="text" name="max_salary" id="max_salary" class="form-control" value="{{ $career->max_salary }}" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" value="{{ $career->details }}"  required>
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '') // Remove non-alphanumeric chars
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/-+/g, '-'); // Replace multiple - with single -
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Select all modals
        document.querySelectorAll('.modal').forEach(function (modal) {
            const titleInput = modal.querySelector('input[name="title"]');
            const slugInput = modal.querySelector('input[name="slug"]');

            if (titleInput && slugInput) {
                titleInput.addEventListener('input', function () {
                    slugInput.value = slugify(titleInput.value);
                });
            }
        });
    });
</script>



