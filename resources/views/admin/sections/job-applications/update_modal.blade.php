<div class="modal fade" id="updatemodel{{ $application->id }}" tabindex="-1" aria-labelledby="updatemodel"
    aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Application</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" action="{{ route('application.update', $application->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" value="{{ $application->first_name }}"
                                class="form-control" required>
                        </div>
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $application->id }}">
                        <div class="col-12">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" name="last_name" value="{{ $application->last_name }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $application->email }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $application->phone }}" class="form-control"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="career_id" class="form-label">Career</label>
                            <select name="career_id" class="form-select" required>
                                <option value="" disabled>Select career</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}"
                                        {{ $application->career_id == $career->id ? 'selected' : '' }}>
                                        {{ $career->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" class="form-select" required>
                                <option value="" disabled>Select country</option>
                                <option value="Egypt" {{ $application->country == 'Egypt' ? 'selected' : '' }}>Egypt
                                </option>
                                <option value="United States"
                                    {{ $application->country == 'United States' ? 'selected' : '' }}>United States
                                </option>
                                <option value="United Kingdom"
                                    {{ $application->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom
                                </option>
                                <option value="Canada" {{ $application->country == 'Canada' ? 'selected' : '' }}>Canada
                                </option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="city" class="form-label">City</label>
                            <select name="city" class="form-select" required>
                                <option value="" disabled>Select city</option>
                                <option value="{{ $application->city }}" selected>{{ $application->city }}</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" name="linkedin" value="{{ $application->linkedin }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="text" name="github" value="{{ $application->github }}"
                                class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="behance" class="form-label">Behance</label>
                            <input type="text" name="behance" value="{{ $application->behance }}"
                                class="form-control">
                        </div>

                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                accept="image/*">
                            <div class="mt-2">
                                @if ($application->hasMedia('application_images'))
                                <a href="{{ $application->getFirstMediaUrl('application_images') }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    View Applicant Image
                                </a>
                                @else
                                <span class="text-muted">No image available</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="cv" class="form-label">CV</label>
                            <input type="file" name="cv" id="cv" class="form-control"
                                accept=".pdf,.doc,.docx">
                            <div class="mt-2">
                                @if ($application->hasMedia('application_cv'))
                                <a href="{{ $application->getFirstMediaUrl('application_cv') }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    View Applicant CV
                                </a>
                                @else
                                <span class="text-muted">No CV available</span>
                                @endif
                            </div>
                        </div>
                    </div><!-- end row -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update Applicantion</button>
                </div>
            </form>
        </div>
    </div>
</div>
