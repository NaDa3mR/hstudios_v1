<div class="modal fade" id="updatemodel{{ $meeting->id }}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Meeting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{ route('meeting.update', $meeting->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row g-3">

                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $meeting->id }}">

                        <div class="col-12">
                            <label class="form-label">Clients</label>
                            <select id="client_edit" name="client_id" class="form-select" required>
                                <option value="" disabled>Select Clients</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $meeting->client_id == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deal</label>
                            <select id="deal_edit" name="deal_id" class="form-select" required>
                                <option value="" disabled>Select Deal</option>
                                @foreach ($deals as $deal)
                                    <option value="{{ $deal->id }}" {{ $meeting->deal_id == $deal->id ? 'selected' : '' }}>
                                        {{ $deal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject', $meeting->subject) }}" required>
                        </div>
                        <div class="col-12">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type_edit" class="form-select" required>
                                @foreach (['Online', 'In-person', 'Phone Call'] as $type)
                                    <option value="{{ $type }}" {{ (old('type', $meeting->type) == $type) ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address_edit" class="form-control" value="{{ old('address', $meeting->address) }}" required>
                        </div>
                        <div class="col-12">
                            <label for="meet_date" class="form-label">Meeting Date</label>
                            <input type="date" name="meet_date" id="meet_date_edit" class="form-control" value="{{ $meeting->meet_date }}" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details_edit" rows="4" class="form-control" required>{{ old('details', $meeting->details) }}</textarea>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update Meeting</button>
                </div>
            </form>
        </div>
    </div>
</div>

