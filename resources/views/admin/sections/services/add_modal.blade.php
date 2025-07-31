
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">Add blog </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('blog.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="sub_title" class="form-label">Subtitle</label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <label for="meta_keyword" class="form-label">Meta_Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="meta_description" class="form-label">Meta_Description</label>
                            <input type="text" name="meta_description" id="meta_description" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="meta_title" class="form-label">Meta_Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="details" class="form-label">Details</label>
                            <input type="text" name="details" id="details" class="form-control" required>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Add Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')   // Remove non-alphanumeric chars
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/-+/g, '-');           // Replace multiple - with single -
    }

    document.addEventListener('DOMContentLoaded', function () {
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');

        title.addEventListener('input', function () {
            slug.value = slugify(title.value);
        });
    });
</script>
