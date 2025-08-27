<div class="modal fade" id="updatemodel{{ $income->id }}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Income</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('income.update', $income->id)}}">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$income->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $income->id }}">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"value="{{ $income->title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="account_id" class="form-label">Account</label>
                            <select name="account_id" id="account_id" class="form-select" required>
                                <option value="">{{ $income->account->name }}</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="income_source_id" class="form-label">Income Source</label>
                            <select name="income_source_id" id="income_source_id" class="form-select" required>
                                <option value="">{{ $income->in_source->name }}</option>
                                @foreach ($income_sources as $income_source)
                                    <option value="{{ $income_source->id }}">{{ $income_source->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" value="{{ $income->amount }}" required>
                        </div>
                        <div class="col-12">
                            <label for="income_date" class="form-label">Income Date</label>
                            <input type="date" name="income_date" id="income_date" class="form-control" value="{{ $income->income_date }}" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" value="{{ $income->details }}" required>
                        </div>

                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
