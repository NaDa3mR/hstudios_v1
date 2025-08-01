<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="overflow-hidden flex-1 d-flex">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="px-5 pt-3 container-fluid">
            <div class="row">
                <div class="mb-3 col-md-12 mb-md-4">
                    <div class="mb-0 shadow-sm card rounded-8">
                        <div class="card-header card-header-action"
                            style="color: #fff; border-bottom: 2px solid rgba(74,96,156,1);">
                            <h6 class="mb-0">Blogs <span
                                    class="badge bg-light text-dark ms-1">{{ $blogs->count() }}</span></h6>
                        </div>
                        <div class="card-body">
                            @if (session('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                            <div class="role-list-view">
                                <table id="datable_4c"
                                    class="table table-hover table-striped table-bordered nowrap w-100">
                                    <thead style="background-color: #f8f8f8;">
                                        <tr>
                                            <th class="fw-bold">Title</th>
                                            <th class="fw-bold">Sub title</th>
                                            <th class="fw-bold">Slug</th>
                                            <th class="fw-bold">Meta Keyword</th>
                                            <th class="fw-bold">Meta Description</th>
                                            <th class="fw-bold">Meta Title</th>
                                            <th class="fw-bold">Details</th>
                                            <th class="fw-bold">Is Active</th>
                                            <th class="fw-bold">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm avatar-rounded avatar-info me-2">
                                                            <span
                                                                class="initial-wrap">{{ substr($blog->title, 0, 1) }}</span>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('blog.show', $blog->id) }}" class="fw-medium text-decoration-none text-dark">
                                                                {{ $blog->title }}
                                                            </a>
                                                            <div class="d-inline-block ms-2">
                                                                <button
                                                                    class="btn btn-icon btn-xs btn-flush-dark btn-rounded flush-soft-hover dropdown-toggle no-caret"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <span class="icon">
                                                                        <span class="feather-icon"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteModal{{ $blog->id }}"><i
                                                                                data-feather="trash-2"></i></span>
                                                                    </span>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->sub_title }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="info" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->slug }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->meta_keyword }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->meta_description }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->meta_title }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i>
                                                        <span>{{ $blog->details }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        {{-- <i data-feather="mail" class="text-muted me-2"
                                                            style="width: 16px; height: 16px;"></i> --}}
                                                        <input type="checkbox" class="toggle-status"
                                                            data-toggle="toggle" data-id="{{ $blog->id }}"
                                                            {{ $blog->is_active ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <span class="feather-icon" data-bs-toggle="modal" data-bs-target="#updatemodel{{$blog->id}}"><i data-feather="edit-2"></i></span> --}}
                                                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">
                                                        <i data-feather="edit-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD



=======
$('.toggle-status').on('change', function() {
let is_active = $(this).is(':checked') ? 1 : 0;
let id = $(this).data('id');

$.ajax({
url: "{{ route('blog.toggleStatus') }}",
method: "POST",
data: {
_token: "{{ csrf_token() }}",
id: id,
is_active: is_active
},
success: function(response) {
console.log(response.message);
},
error: function(xhr) {
console.error("Toggle failed:", xhr.responseText);
}
});
});
>>>>>>> 4480478 (blogs views updates)
