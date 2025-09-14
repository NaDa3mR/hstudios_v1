<div class="modal fade" id="updatemodel{{$transfer->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('transfer.update', $transfer->id)}}">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$transfer->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $transfer->id }}">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $transfer->title }}" required>
                        </div>
                        <div class="col-6">
                            <label for="account_id_from" class="form-label">From Account</label>
                            <input type="text" name="account_id_from" id="account_id_from" class="form-control" value="{{ $transfer->account_id_from }}" required>
                        </div>
                        <div class="col-6">
                            <label for="account_id_to" class="form-label">To Account</label>
                            <input type="text" name="account_id_to" id="account_id_to" class="form-control" value="{{ $transfer->account_id_to }}" required>
                        </div>
                        <div class="col-6">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" value="{{ $transfer->amount }}" required>
                        </div>
                        <div class="col-6">
                            <label for="transfer_date" class="form-label">Transfer Date</label>
                            <input type="date" name="transfer_date" id="transfer_date" class="form-control"value="{{ $transfer->transfer_date }}" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" value="{{ $transfer->details }}" required>
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



