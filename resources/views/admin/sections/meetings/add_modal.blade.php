<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Meeting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('meeting.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Clients</label>
                            <select id="client_add" name="client_id" class="form-select">
                                <option value="" disabled selected>Select Clients</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Deal</label>
                            <select id="deal_add" name="deal_id" class="form-select">
                                <option value="" disabled selected>Select Deal</option>
                                @foreach ($deals as $deal)
                                    <option value="{{ $deal->id }}">{{ $deal->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject"  class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select" required>
                                @foreach (['Online', 'In-person', 'Phone Call'] as $type)
                                    <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="meet_date" class="form-label">Meeting Date</label>
                            <input type="date" name="meet_date" id="meet_date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details" rows="4" class="form-control" required></textarea>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Meeting</button>
                </div>
            </form>
        </div>
    </div>
</div>

