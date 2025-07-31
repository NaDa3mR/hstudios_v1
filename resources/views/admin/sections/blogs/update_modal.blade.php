
<div class="modal fade" id="updatemodel{{$blog->id}}" tabindex="-1" aria-labelledby="updatemodel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatemodel">Edit BLog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBlogForm" method="POST" action="{{route('blog.update', $blog->id)}}">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" id="edit_blog_id" value="{{$blog->id}}">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
                        </div>
                        <input id="id" type="hidden" name="id" class="form-control"
                        value="{{ $blog->id }}">
                        <div class="col-12">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control"value="{{ $blog->sub_title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug }}" required>
                        </div>
                        <div class="col-12">
                            <label for="meta_keyword" class="form-label">Meta_Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ $blog->meta_keyword }}" required>
                        </div>
                        <div class="col-12">
                            <label for="meta_description" class="form-label">Meta_Description</label>
                            <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ $blog->meta_description }}" required>
                        </div>
                        <div class="col-12">
                            <label for="meta_title" class="form-label">Meta_Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control"value="{{ $blog->meta_title }}" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" value="{{ $blog->details }}" required>
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


