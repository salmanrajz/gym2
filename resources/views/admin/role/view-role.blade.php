
@extends('layouts/contentLayoutMaster')

@section('title', 'Role Management')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')
{{-- <div class="row">
  <div class="col-12">
    <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
  </div>
</div> --}}
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="container mb-2">
        <button class="btn btn-success" data-target="#modals-slide-in" data-toggle="modal">Add New</button>
    </div>
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($data as $key => $item)                  
              <tr>
                <td>{{++$key}}</td>
                <td>{{$item->name}}</td>
                 <td class="product-action">
                <span class="action-edit" ><i class="feather icon-edit" data-toggle="tooltip" title="Edit"></i></span>
                <span class="action-delete" ><i class="feather icon-trash"></i></span>
                {{-- <span class=""><i class="feather icon-trash"  data-toggle="tooltip" title="Delete" onclick="return confirm('are you sure you want to delete this campaign, this action will never be revive back?')"></i></span> --}}
                <span class="" ><i class="feather icon-eye"  data-toggle="tooltip" title="View Promotion/Campaign Details" ></i></span>
                <span class="" ><i class="feather icon-bell"  data-toggle="tooltip" title="Send Notifications to Active Users" ></i></span>
              </td>
              </tr>
              @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal to add new record -->
  <div class="modal modal-slide-in fade" id="modals-slide-in">
    <div class="modal-dialog sidebar-sm">
      <form class="add-new-record modal-content pt-0" id="ClassesAdd" onsubmit="return false;">
          @csrf
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title" id="exampleModalLabel">New /Update Record</h5>
        </div>
        <div class="modal-body flex-grow-1">
          <div class="form-group">
            <label class="form-label" for="basic-icon-default-fullname">Role Name</label>
            <input
              type="text"
              class="form-control dt-full-name"
              id="basic-icon-default-fullname"
              placeholder="John Doe"
              aria-label="John Doe" name="name"
              autocomplete="off"
            />
          </div>
          <div class="col-sm-12 data-field-col-data-list-upload mt-3">
                    {{-- <div class="alert alert-danger print-error-msg" style="display:none">
                      <ul></ul>
                  </div> --}}
                   <div class="alert alert-danger alert-validation-msg print-error-msg" role="alert" style="display: none">
              <div class="alert-body">
                  <ul></ul>
                {{-- <i data-feather="info" class="mr-50 align-middle"></i> --}}
                {{-- <span>The value is <strong>invalid</strong>. You can only enter numbers.</span> --}}
              </div>
            </div>
            </div>
          {{--  --}}
          <button type="button" class="btn btn-primary data-submit mr-1" onclick="VerifyLead('{{route('role.create')}}','ClassesAdd','{{route('role.index')}}')">Submit</button>
          <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</section>
<!--/ Basic table -->

@endsection


@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{asset('js/main.js')}}"></script>
  {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> --}}
@endsection
