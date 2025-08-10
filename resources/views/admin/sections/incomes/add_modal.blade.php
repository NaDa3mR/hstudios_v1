<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add Incomes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('income.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="account_id" class="form-label">Choose Account</label>
                            <select name="account_id" id="account_id" class="form-select" required>
                                <option value="">-- Select Account --</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="income_source_id" class="form-label">Choose Source</label>
                            <select name="income_source_id" id="income_source_id" class="form-select" required>
                                <option value="">-- Select Source --</option>
                                @foreach ($income_sources as $income_source)
                                    <option value="{{ $income_source->id }}">{{ $income_source->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="income_date" class="form-label">Incomes Date</label>
                            <input type="date" name="income_date" id="income_date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Incomes</button>
                </div>
            </form>
        </div>
    </div>
</div>
