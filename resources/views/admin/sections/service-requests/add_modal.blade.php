<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add service request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('service-request.store') }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name" class="form-label">Request Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="client_id" class="form-label">Client</label>
                            <select name="client_id" id="client_id" class="form-select" required>
                                <option value="">-- Select Client --</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="services" class="form-label">Services</label>
                            <select name="services[]" id="services" class="form-select" multiple required>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <textarea name="details" id="details" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="request_file" class="form-label">Request File</label>
                            <input type="file" name="request_file" id="request_file" class="form-control"
                                accept=".pdf,.doc,.docx">
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
