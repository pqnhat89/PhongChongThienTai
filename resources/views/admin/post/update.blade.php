<div class="modal-header">&nbsp;</div>
<form method="POST" enctype="multipart/form-data"
    action="{{ route('admin.post.update', ['id' => $post->id ?? 0]) }}">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="title">Tiêu đề</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" value="{{ $post->title ?? null }}">
        </div>
        <div class="form-group">
            <label for="sub_title">Tóm tắt</label>
            <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="tóm tắt" value="{{ $post->sub_title ?? null }}">
        </div>
        <div class="form-group">
            <label for="type">Danh mục</label><br>
            <select name="type" id="type">
                <option value="">Chọn danh mục ...</option>
                @foreach (\App\Enums\PostType::toArray() as $v)
                    <option value="{{ $v }}" {{ ($post->type ?? null) == $v ? 'selected' : null }}>
                        {{ $v }}
                    </option>
                @endforeach
            </select> 
        </div>
        <div class="form-group">
            <label for="image">Ảnh</label>
            <input class="form-control ckfinder" id="image" name="image" type="text" placeholder="Ảnh" value="{{ $post->image ?? null }}">
        </div>
        <div class="form-group">
            <label for="file">
                File đính kèm: 
                @if ($post->file ?? null)
                    <a target="_blank" href="{{ '/public/files/' . $post->file }}">Tải file</a>
                @endif
            </label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea class="form-control" id="content" name="content">
                {{ $post->content ?? null }}
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>

{{-- <script>
    $(document).on('click', '.modal #save', function () {
        $.ajax({
            method: 'post',
            url: $(this).data('url'),
            data: {
                _method: 'put',
                _token: '{{ csrf_token() }}',
                title: $('#title').val(),
                sub_title: $('#sub_title').val(),
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
</script> --}}