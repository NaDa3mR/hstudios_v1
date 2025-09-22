<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label for="client_id" class="form-label">Client</label>
                            <select name="client_id" id="client_id" class="form-control" required>
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Deal --}}
                        <div class="col-6">
                            <label for="deal_id" class="form-label">Deal</label>
                            <select name="deal_id" id="deal_id" class="form-control">
                                <option value="">-- Select Deal --</option>
                            </select>
                        </div>

                        {{-- Invoice Number --}}
                        <div class="col-6">
                            <label for="invoice_number" class="form-label">Invoice Number</label>
                            <input type="text" class="form-control" value="will be generated...." readonly>
                        </div>

                        {{-- Amount --}}
                        <div class="col-6">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" name="amount" id="amount" class="form-control" required>
                        </div>

                        {{-- Invoice Date --}}
                        <div class="col-6">
                            <label for="invoice_date" class="form-label">Invoice Date</label>
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control" required>
                        </div>

                        {{-- Status --}}
                        <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="unpaid">Unpaid</option>
                                <option value="pending">Pending</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>

                        {{-- Details --}}
                        <div class="col-12">
                            <label for="details" class="form-label">Details (Optional)</label>
                            <textarea name="details" id="details" class="form-control" rows="3"></textarea>
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Invoice</button>
                </div>
            </form>
        </div>
    </div>
</div>
