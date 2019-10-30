@extends('admin.layouts.default')

@section('mainBody')
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">角色权限设置</h3>
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
    <div class="row">
      <div class="col-md-6">
      <div class="kt-portlet__body kt-portlet__body--fit">
          <form class="kt-form kt-form--label-right" method="post" action="{{ route('admin.roles.assignPermissionsSave') }}">

          <div class="form-group">
            <label></label>
            <div class="kt-checkbox-inline">
              @foreach ($all_permissions as $id=>$display_name)
              <label class="kt-checkbox">
                <input type="checkbox" name="permissions_id[]" 
                  @if(in_array($id, $role_permissions))
                    checked="checked" 
                  @endif
                 value="{{ $id }}"> {{ $display_name }}
                <span></span>
              </label>
              @endforeach
            </div>
            
          </div>

          <input type="hidden" name="id" value="{{ $role->id }}">
          {{ csrf_field() }}
          <span class="form-text text-muted"><button type="submit" class="btn btn-success px-4">提交</button></span>
          </form>
        </div>
    </div>
  </div>
@endsection
