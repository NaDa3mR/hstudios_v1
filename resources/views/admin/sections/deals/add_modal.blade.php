<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('deal.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="service_request_id" class="form-label">Choose Service Request</label>
                            <select name="service_request_id" id="service_request_id" class="form-select" required>
                                <option value="">-- Select Service Request --</option>
                                @foreach ($service_requests as $service_request)
                                    <option value="{{ $service_request->id }}"
    data-client-id="{{ $service_request->client->id }}"
    data-client-name="{{ $service_request->client->name }}"
    data-services='@json($service_request->services->pluck("name", "id"))'>
    {{ $service_request->name ?? 'Deleted' }}
</option>

                                @endforeach

                            </select>
                        </div>
                        <input type="hidden" name="client_id" id="client_id">
                        <div class="col-12">
                            <input type="text" id="client_name" class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <label for="service_id" class="control-label">Choose Client Service</label>
                            <select name="services[]" id="services" multiple class="form-control" required>
</select>

                        </div>
                        <div class="col-12">
                            <label for="name" class="form-label">Deal Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="price" class="form-label">Deal Price</label>
                            <input type="text" name="price" id="price" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="pending" selected>Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="won">Won</option>
                                <option value="lost">Lost</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Deal</button>
                </div>
            </form>
        </div>
    </div>
</div>
