<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Image / Video</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Upload Image or Video</h5>
            <input type="file" id="fileInput" name="media" class="form-control" accept="image/*,video/*" multiple>
            <div id="preview" class="row mt-4 g-3">
                @if($formMode == 'edit' && !empty($post?->media?->url) && !empty($post?->media?->type))
                    <div class="col-md-8">
                        <div class="border rounded p-2 shadow-sm bg-white">
                            @if(Str::startsWith($post?->media?->type, 'image'))
                                <img src="{{ asset($post?->media?->url) }}" class="img-fluid rounded" alt="Image Preview">
                            @elseif(Str::startsWith($post?->media?->type, 'video'))
                                <video class="w-100 rounded" controls>
                                    <source src="{{ asset($post?->media?->url) }}" type="video/mp4">
                                </video>
                                
                            @endif
                        </div>
                    </div>
                @endif
            </div>
            {!! $errors->first('media', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    
</div>
