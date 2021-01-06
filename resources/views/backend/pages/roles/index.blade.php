@extends('backend.layouts.master', [
        'title'=>'Role And Permission Creation',
        'bread' => 'Dashboard'
])
@section('title') Role & Permission Creation @endsection

@section('content')
<div class="col-lg-10 offset-lg-1">
        <h6 class="text-uppercase mt-3 text-white text-center display-5">Role List <a href="" class="btn btn-info" data-toggle="modal" data-target="#crateRole">Create New Role</a></h6>
          <table class="table table-dark table-striped shadow-dark">
            <thead>
              <tr>
                <th scope="col">S.I</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="roleList">
                @include('backend.pages.roles.list')
            </tbody>
          </table>
      </div>
@endsection
@section('modals')
<div class="modal fade" id="crateRole">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content animated rollIn">
      <div class="modal-header">
        <h5 class="modal-title">Create Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <hr>
            <form action="{{route('backend.role.store')}}" method="POST" id="createRole">
              @csrf
                <div class="form-group">
                  <label for="roleName">Role Name</label>
                  <input type="text" class="form-control" id="roleName" name="role_name" placeholder="Enter Role Name">
                </div>
                <div class="form-group text-center">
                  <div class="icheck-primary">
                    <input type="checkbox" id="permisssionId" class="checkall">
                    <label for="permisssionId">All Permission</label>
                    </div>
                </div>
                <hr>
                @php $i = 1; @endphp
                @foreach ($permission_groups as $group)
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                            </div>
                        </div>

                        <div class="col-9 role-{{ $i }}-management-checkbox">
                            @php
                                $permissions = App\User::getpermissionsByGroupName($group->name);
                                $j = 1;
                            @endphp
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @php  $j++; @endphp
                            @endforeach
                            <br>
                        </div>

                    </div>
                    @php  $i++; @endphp
                @endforeach
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
@section('custom_script')
  <script>
      $('#createRole').submit(function(e) {
            e.preventDefault();
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
                };
            var route = $(this).attr('action');
            var data = $(this).serialize();
            var method = $(this).attr('method');
            $.ajax({
                data : data,
                type : method,
                url  : route,
                success : function(){
                    $('#crateRole').modal('hide');
                    $.get("{{route('backend.role.list')}}",function(data){
                        toastr.success('Successfully Role Created!!');
                        $('#roleList').empty().html(data);
                        document.getElementById("createRole").reset();
                    })  
                },
                error: function(response) {
                  toastr.error("Something went wrong...");
                }
            });
        });
        $('.checkall').click(function(){
          if ($(this).is(':checked')) {
            $('input[type="checkbox"]').prop('checked',true);
          }else{
            $('input[type="checkbox"]').prop('checked',false);
          }
        })
  </script>
  <script>
      function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+className+' input');
        if(groupIdName.is(':checked')){
              classCheckBox.prop('checked', true);
          }else{
              classCheckBox.prop('checked', false);
          }
      }
  </script>
@endsection