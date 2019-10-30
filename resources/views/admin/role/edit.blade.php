@extends('admin.layouts.default')

@section('mainBody')
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">角色管理</h3>
      </div>
      <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
          <a href="{{ route('admin.roles.index') }}" class="btn kt-subheader__btn-primary">
            <i class="flaticon2-back"></i> &nbsp; 返回
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="kt-container  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">修改角色信息</h3>
        </div>
      </div>
    
      <form class="kt-form kt-form--label-right" method="post" action="{{ route('admin.roles.update', $role) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $role->id }}">
        
        <div class="kt-portlet__body">
          <div class="form-group row">
            <label for="input-display_name" class="col-2 col-form-label">名称</label>
            <div class="col-10">
              <input name="display_name" id="input-display_name" class="form-control" type="text" value="{{ old('display_name', $role->display_name) }}">
              <div class="text-danger">{{ $errors->first('display_name') }}</div>
            </div>
          </div>

          <div class="form-group row">
            <label for="input-name" class="col-2 col-form-label">标识</label>
            <div class="col-10">
              <input name="name" id="input-name" disabled="disabled" class="form-control" type="text" value="{{ old('name', $role->name) }}">
              <div class="text-danger">{{ $errors->first('name') }}</div>
            </div>
          </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-10 offset-2">
                <button type="submit" class="btn btn-success px-4">提交</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
