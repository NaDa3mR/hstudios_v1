<div class="modal fade" id="updatemodel{{$candidate->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Candidate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" action="{{ route('candidate.update', $candidate->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="first_name-{{ $candidate->id }}" class="form-label">First Name</label>
                            <input type="text" name="first_name" id="first_name-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->first_name }}" required>
                        </div>

                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $candidate->id }}">

                        <div class="col-12">
                            <label for="last_name-{{ $candidate->id }}" class="form-label">Last Name</label>
                            <input type="text" name="last_name" id="last_name-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->last_name }}" required>
                        </div>

                        <div class="col-12">
                            <label for="email-{{ $candidate->id }}" class="form-label">Email</label>
                            <input type="email" name="email" id="email-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->email }}" required>
                        </div>

                        <div class="col-12">
                            <label for="phone-{{ $candidate->id }}" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->phone }}" required>
                        </div>

                        <div class="col-12">
                            <label for="career_id" class="form-label">Career</label>
                            <select name="career_id" class="form-select" required>
                                <option value="" disabled>Select career</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}"
                                        {{ $candidate->career_id == $career->id ? 'selected' : '' }}>
                                        {{ $career->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="country-{{ $candidate->id }}" class="form-label">Country</label>
                            <select name="country" id="country-{{ $candidate->id }}" class="form-select" required>
                                <option value="" disabled>Select country</option>
                                <option value="Egypt" {{ $candidate->country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                <option value="United States" {{ $candidate->country == 'United States' ? 'selected' : '' }}>United States</option>
                                <option value="United Kingdom" {{ $candidate->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="Canada" {{ $candidate->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <label for="city-{{ $candidate->id }}" class="form-label">City</label>
                            <select name="city" id="city-{{ $candidate->id }}" class="form-select" required>
                                <option value="{{ $candidate->city }}" selected>{{ $candidate->city }}</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="linkedin-{{ $candidate->id }}" class="form-label">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->linkedin }}" required>
                        </div>

                        <div class="col-12">
                            <label for="github-{{ $candidate->id }}" class="form-label">GitHub</label>
                            <input type="text" name="github" id="github-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->github }}" required>
                        </div>

                        <div class="col-12">
                            <label for="behance-{{ $candidate->id }}" class="form-label">Behance</label>
                            <input type="text" name="behance" id="behance-{{ $candidate->id }}"
                                   class="form-control" value="{{ $candidate->behance }}">
                        </div>
                    </div><!--end row-->
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update Candidate</button>
                </div>
            </form>
        </div>
    </div>
</div>
