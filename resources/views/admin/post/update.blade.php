<div class="modal-header">&nbsp;</div>
<div class="modal-body">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control" id="url" placeholder="Url" value="{{ $post->url }}">
    </div>
    @if ($post->type != \App\Enums\PostType::PAGE)
        <div class="form-group">
            <label for="type">Danh mục</label><br>
            @php 
                $type = \App\Enums\PostType::toArray();
                unset($type['PAGE']);
            @endphp
            <select name="type" id="type">
                @foreach ($type as $v)
                    <option value="{{ $v }}" {{ $post->type == $v ? 'selected' : null }}>
                        {{ $v }}
                    </option>
                @endforeach
            </select> 
        </div>
    @endif
    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control ckfinder" id="image" type="text" value="{{ $post->image }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content">
            {{ $post->content }}
        </textarea>
        <script type="text/javascript">
            var editor = CKEDITOR.instances['content'];
            if (editor) {
                editor.destroy(true);
            }
            editor = CKEDITOR.replace('content');
            CKFinder.setupCKEditor(editor, '/plugins/ckfinder');
        </script>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="save" data-url="{{ route('admin.post.update', ['id' => $post->id]) }}">Save
    </button>
    <script>
        $(document).on('click', '.modal #save', function () {
            $.ajax({
                method: 'post',
                url: $(this).data('url'),
                data: {
                    _method: 'put',
                    _token: '{{ csrf_token() }}',
                    title: $('#title').val(),
                    url: $('#url').val(),
                    type: $('#type').val(),
                    image: $('#image').val(),
                    content: CKEDITOR.instances.content.getData()
                },
                success: function () {
                    location.reload();
                }
            });
        });
    </script>
</div>