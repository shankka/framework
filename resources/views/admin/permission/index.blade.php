@extends('admin.layouts.default')

@section('mainBody')
  <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
      <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">权限管理</h3>
      </div>
      <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
          <a href="{{ route('admin.permissions.create') }}" class="btn kt-subheader__btn-primary">
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
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">权限</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">标识</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">创建时间</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">最后活跃时间</span></th>
                <th class="kt-datatable__cell kt-datatable__cell--sort"><span style="width:135px;">操作</span></th>
              </tr>
            </thead>
            <tbody class="kt-datatable__body" style="">
              @foreach ($permissions as $permission)
                <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $permission->display_name }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $permission->name }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $permission->created_at }}</span></td>
                  <td class="kt-datatable__cell"><span style="width:135px;">{{ $permission->updated_at }}</span></td>
                  <td class="kt-datatable__cell">
                    <span style="width:135px">
                      <a href="{{ route('admin.permissions.edit', $permission) }}" title="编辑" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                      <a href="javascript:void(0)" onclick="destroy({{ $permission->id }})" title="删除" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-trash"></i></a>
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <div class="kt-datatable__pager kt-datatable--paging-loaded">
            {{ $permissions->links() }}
          </div>
          {{ csrf_field() }}
        </div>
      </div>

      <script>
      function destroy(id) {
          var message = '是否删除该权限';
          if (confirm(message)) {
              var url = '{{ route('admin.permissions.destroy', $permission) }}';
              postDelete(url, {id: id});
          }
      }

      function postDelete(url, params) {
        var form = document.createElement('form');
        form.method = 'post';
        form.action = url;

        var token = document.createElement('input');
        token.name = '_token';
        token.type = 'hidden';
        token.value = document.body.querySelector('[name=_token]').value;
        form.appendChild(token);

        var method = document.createElement('input');
        method.name = '_method';
        method.type = 'hidden';
        method.value = 'DELETE';
        form.appendChild(method);

        for (key in params) {
            var input = document.createElement('input');
            input.name = key;
            input.type = 'hidden';
            input.value = params[key];

            form.appendChild(input);
        }

        document.body.appendChild(form);
        form.submit();
      }
      </script>
    </div>
  </div>
@endsection
