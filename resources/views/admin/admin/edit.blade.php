@extends('admin.layouts.default')

@section('mainBody')
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">管理员管理</h3>
      </div>
      <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
          <a href="#" class="btn kt-subheader__btn-primary">
            <i class="flaticon2-plus-1"></i> &nbsp; 新增
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="kt-container  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">更新管理员信息</h3>
        </div>
      </div>
    
      <form class="kt-form kt-form--label-right" method="post" action="{{ route('admin.admins.update', $admin) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ $admin->id }}">
        
        <div class="kt-portlet__body">
          @include('admin.admin._form')
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
