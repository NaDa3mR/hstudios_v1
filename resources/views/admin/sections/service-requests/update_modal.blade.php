<div class="modal fade" id="updatemodel{{$service_request->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('service-request.update', $service_request->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Request Name</label>
                            <input type="text" name="name" id="name" value="{{ $service_request->name }}" class="form-control" required>
                        </div>
                        <input type="hidden" name="id" value="{{ $service_request->id }}">
                        <div class="col-12">
                            <label for="client_id" class="form-label">Client</label>
                            <select name="client_id" id="client_id" class="form-select" required>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $service_request->client_id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="services" class="form-label">Services</label>
                            <select name="services[]" id="services" class="form-select" multiple required>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ in_array($service->id, $service_request->services->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details" rows="4" class="form-control" required>{{ $service_request->details }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="request_file" class="form-label">Request File</label>
                            <input type="file" name="request_file" id="request_file" class="form-control"
                                accept=".pdf,.doc,.docx">
                            <div class="mt-2">
                                @if ($service_request->hasMedia('service_file'))
                                <a href="{{ $service_request->getFirstMediaUrl('service_file') }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    View Request File
                                </a>
                                @else
                                <span class="text-muted">No File available</span>
                                @endif
                            </div>
                        </div>
                    </div><!-- end row -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
