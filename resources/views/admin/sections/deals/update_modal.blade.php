<!-- Modal -->
<div class="modal fade" id="updatemodel{{ $deal->id }}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('deal.update', $deal->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="service_request" class="form-label">Service Request</label>
                        <input type="text" class="form-control"
                            value="Request :{{ $deal->serviceRequest->name ?? 'Deleted' }}" readonly>
                        <input type="hidden" name="service_request_id"
                            value="{{ $deal->serviceRequest->name ?? 'Deleted' }}">
                    </div>
                    <input type="hidden" name="id" value="{{ $deal->id }}">
                    <div class="mb-3">
                        <label for="client" class="form-label">Client</label>
                        <input type="text" class="form-control" value="{{ $deal->serviceRequest->client->name }}"
                            readonly>
                        <input type="hidden" name="client_id" value="{{ $deal->serviceRequest->client->id }}">
                    </div>

                    <div class="mb-3">
                        <label for="services" class="form-label">Services</label>
                        <select name="services[]" class="form-select" multiple required>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ $deal->services->contains($service->id) ? 'selected' : '' }}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="pending" {{ $deal->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $deal->status == 'in_progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="completed" {{ $deal->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                            <option value="won" {{ $deal->status == 'won' ? 'selected' : '' }}>Won</option>
                            <option value="lost" {{ $deal->status == 'lost' ? 'selected' : '' }}>Lost
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea name="details" class="form-control" rows="3">{{ $deal->details }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Deal Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $deal->name ?? 'Deleted' }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
