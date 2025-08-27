<div class="modal fade" id="updatemodel{{$account->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Acoount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('account.update', $account->id)}}">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$account->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $account->id }}">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"value="{{ $account->name }}" required>
                        </div>
                        <div class="col-12">
                            <label for="balance" class="form-label">Balance</label>
                            <input type="text" name="balance" id="balance" class="form-control" value="{{ $account->balance }}" required>
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




