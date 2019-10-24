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
    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
          
          <table class="kt-datatable__table" style="display: block;">
            <thead class="kt-datatable__head">
              <tr class="kt-datatable__row" style="left: 0px;">
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">ID</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">帐号</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">密码</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">创建时间</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">最后活跃时间</span></th>
              </tr>
            </thead>
            <tbody class="kt-datatable__body" style="">
              @foreach ($admins as $admin)
                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $admin->id }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $admin->nickname }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $admin->account }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $admin->created_at }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ '-' }}</span></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          
          <div class="kt-datatable__pager kt-datatable--paging-loaded">
            {{ $admins->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
