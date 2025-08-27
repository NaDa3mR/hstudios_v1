<div class="modal fade" id="updatemodel{{$employee->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('employee.update', $employee->id)}}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$employee->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $employee->id }}">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$employee->name}}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$employee->email}}">
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{$employee->phone}}">
                        </div>
                        <div class="col-12">
                            <label for="job" class="form-label">Job</label>
                            <input type="text" name="job" id="job" class="form-control" value="{{$employee->job}}">
                        </div>
                        <div class="col-12">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{$employee->linkedin}}">
                        </div>
                        <div class="col-12">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="text" name="github" id="github" class="form-control" value="{{$employee->github}}">
                        </div>
                        <div class="col-12">
                            <label for="behance" class="form-label">Behance</label>
                            <input type="text" name="behance" id="behance" class="form-control"value="{{$employee->behance}}">
                        </div>
                        <div class="col-12">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" name="salary" id="salary" class="form-control" value="{{$employee->salary}}">
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                accept="image/*">
                            <div class="mt-2">
                                <a href="{{ $employee->getFirstMediaUrl('employee_images') }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    View Employee Image
                                </a>
                            </div>
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


