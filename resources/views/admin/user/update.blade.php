<div class="modal-header">&nbsp;</div>
<div class="modal-body">
    <div class="form-group">
        <label for="name">Tên người dùng</label>
        <input type="text" class="form-control" id="name" placeholder="Tên người dùng" value="{{ $user->name ?? null }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" value="{{ $user->email ?? null }}"
            {{ isset($user) ? 'disabled' : null }}>
    </div>
    <div class="form-group">
        <label for="newpassword">Mật khẩu</label>
        <input class="form-control" id="newpassword" type="text" placeholder="Mật khẩu">
    </div>
    <div class="form-group">
        <label for="renewpassword">Nhập lại mật khẩu</label>
        <input class="form-control" id="renewpassword" type="text" placeholder="Nhập lại mật khẩu">
    </div>
    <div class="form-group">
        <label for="currentpassword">Xác nhận: Nhập mật khẩu hiện tại của bạn</label>
        <input class="form-control" id="currentpassword" type="text" placeholder="Mật khẩu hiện tại của bạn">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
    <button type="button" class="btn btn-primary" id="save" data-url="{{ route('admin.user.update', ['id' => $user->id ?? 0]) }}">
        Lưu
    </button>
</div>