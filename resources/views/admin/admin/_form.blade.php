<div class="form-group row">
  <label for="input-nickname" class="col-2 col-form-label">昵称</label>
  <div class="col-10">
    <input name="nickname" id="input-nickname" class="form-control" type="text" value="{{ old('nickname', $admin->nickname) }}">
    <div class="text-danger">{{ $errors->first('nickname') }}</div>
  </div>
</div>

<div class="form-group row">
  <label for="input-account" class="col-2 col-form-label">帐号</label>
  <div class="col-10">
    <input name="account" id="input-account" class="form-control" type="text" value="{{ old('account', $admin->account) }}">
    <div class="text-danger">{{ $errors->first('account') }}</div>
  </div>
</div>

<div class="form-group row">
  <label for="input-password" class="col-2 col-form-label">密码</label>
  <div class="col-10">
    <input name="password" id="input-password" class="form-control" type="text" value="{{ old('password') }}">
    <div class="text-danger">{{ $errors->first('password') }}</div>
  </div>
</div>

<div class="form-group row">
  <label for="input-password_confirmation" class="col-2 col-form-label">重复密码</label>
  <div class="col-10">
    <input name="password_confirmation" id="input-password_confirmation" class="form-control" type="text" value="{{ old('password_confirmation') }}">
    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
  </div>
</div>
