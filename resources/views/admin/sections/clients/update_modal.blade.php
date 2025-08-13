<div class="modal fade" id="updatemodel{{ $client->id }}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{ route('client.update', $client->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                {{-- <input type="hidden" name="id" id="edit_service_id" value="{{$client->id}}"> --}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input id="id" type="hidden" name="id" class="form-control"
                            value="{{ $client->id }}">
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control"value="{{ $client->name }}">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $client->email }}">
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                value="{{ $client->password }}">
                        </div>
                        <div class="col-12">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control"
                                value="{{ $client->company_name }}">
                        </div>
                        <div class="col-12">
                            <label for="company_field" class="form-label">Company Field</label>
                            <input type="text" name="company_field" id="company_field" class="form-control"
                                value="{{ $client->company_field }}">
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            <div class="mt-2">
                                @if ($client->hasMedia('client_images'))
                                    <a href="{{ $client->getFirstMediaUrl('client_images') }}" target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        View Client Image
                                    </a>
                                @else
                                    <span class="text-muted">No image available</span>
                                @endif
                            </div>
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
