<div class="modal fade" id="updatemodel{{$invoice->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $invoice->id }}">Edit Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        {{-- Client --}}
                        <div class="col-6">
                            <label for="client_id{{ $invoice->id }}" class="form-label">Client</label>
                            <select name="client_id" id="client_id{{ $invoice->id }}" class="form-control" required>
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $invoice->client_id == $client->id ? 'selected' : '' }}>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Deal --}}
                        <div class="col-6">
                            <label for="deal_id{{ $invoice->id }}" class="form-label">Deal</label>
                            <select name="deal_id" id="deal_id{{ $invoice->id }}" class="form-control">
                                <option value="">-- Select Deal --</option>
                                @foreach($deals as $deal)
                                    <option value="{{ $deal->id }}" {{ $invoice->deal_id == $deal->id ? 'selected' : '' }}>
                                        {{ $deal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="invoice_number" class="form-label">Invoice Number</label>
                            <input type="text" value="{{ $invoice->invoice_number }}" class="form-control" disabled>
                            <input type="hidden" name="invoice_number" value="{{ $invoice->invoice_number }}">
                        </div>

                        {{-- Amount --}}
                        <div class="col-6">
                            <label for="amount{{ $invoice->id }}" class="form-label">Amount</label>
                            <input type="number" name="amount" id="amount{{ $invoice->id }}"
                                   class="form-control" value="{{ $invoice->amount }}" step="0.01" min="0" required>
                        </div>

                        {{-- Invoice Date --}}
                        <div class="col-6">
                            <label for="invoice_date{{ $invoice->id }}" class="form-label">Invoice Date</label>
                            <input type="date" name="invoice_date" id="invoice_date{{ $invoice->id }}"
                                   class="form-control" value="{{ $invoice->invoice_date->format('Y-m-d') }}" required>
                        </div>

                        {{-- Status --}}
                        <div class="col-6">
                            <label for="status{{ $invoice->id }}" class="form-label">Status</label>
                            <select name="status" id="status{{ $invoice->id }}" class="form-control" required>
                                <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                <option value="pending" {{ $invoice->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            </select>
                        </div>

                        {{-- Details --}}
                        <div class="col-12 ">
                            <label for="details{{ $invoice->id }}" class="form-label">Details</label>
                            <textarea name="details" id="details{{ $invoice->id }}" class="form-control" rows="3">{{ $invoice->details }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Update Invoice</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
