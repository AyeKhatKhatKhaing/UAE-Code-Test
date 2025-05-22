<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">Create New Comment</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="float-left">
                
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    Save</button>
                <button type="button" class="btn btn-secondary cancel" onclick="window.location='{{ url('posts') }}'"><i class="bi bi-x"
                        aria-hidden="true"></i> Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-body content-body">
                <div class="form-group mb-4">
                    <label for="post" class="control-label mb-3">Post</label>
                    <input type="text" name="post" id="post" disabled class="form-control" value="{{ $post?->title }}">
                </div>
                <div class="form-group{{ $errors->has('content') ? 'has-error' : ''}} mb-4">
                    <label for="content" class="control-label mb-3 required">Content</label>
                    <textarea name="content" id="content" class="form-control editor"></textarea>
                </div>
            </div>
        </div>
    </div>
    @include('post.partials._right_sidebar')
</div>

