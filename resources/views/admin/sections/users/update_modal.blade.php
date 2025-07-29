@foreach ($users as $user)
<div class="modal fade" id="editUserModal{{$user->id}}" tabindex="-1" aria-labelledby="editUserModalLabel{{$user->id}}" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel{{$user->id}}">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="edit_name_{{$user->id}}" class="form-label">Name</label>
                            <input type="text" name="name" id="edit_name_{{$user->id}}" class="form-control" value="{{ $user->name }}" required>
                        </div>
                        <div class="col-12">
                            <label for="edit_email_{{$user->id}}" class="form-label">Email</label>
                            <input type="email" name="email" id="edit_email_{{$user->id}}" class="form-control" value="{{ $user->email }}" required>
                        </div>
                        <div class="col-12">
                            <label for="edit_role_{{$user->id}}" class="form-label">Select Role</label>
                            <select name="role" id="edit_role_{{$user->id}}" class="form-control" required>
                                <option value="" disabled>Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if($user->getRoleNames()->first() == $role->name) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="edit_password_{{$user->id}}" class="form-label">Password <small class="text-muted">(leave blank to keep current)</small></label>
                            <input type="password" name="password" id="edit_password_{{$user->id}}" class="form-control" autocomplete="new-password">
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
@endforeach
