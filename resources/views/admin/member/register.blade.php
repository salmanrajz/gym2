
@extends('layouts/contentLayoutMaster')

@section('title', 'Member List')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
{{--  --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
{{--  --}}

@endsection

@section('content')
{{-- <div class="row">
  <div class="col-12">
    <p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
  </div>
</div> --}}
<!-- Basic table -->
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Membership Registration Form</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical" id="ClassesAdd">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="first-name-vertical">First Name</label>
                  <input
                    type="text"
                    id="first-name-vertical"
                    class="form-control" autocomplete="off"
                    name="first_name"
                    placeholder="First Name"
                  />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="email-id-vertical">Last Name</label>
                  <input type="text" id="email-id-vertical" class="form-control" autocomplete="off" name="last_name" placeholder="Last Name" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="email-id-vertical">Email</label>
                  <input type="email" id="email-id-vertical" class="form-control" autocomplete="off" name="email" placeholder="Email" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="contact-info-vertical">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="contact-info-vertical">Contact #</label>
                  <input
                    type="number"
                    id="contact-info-vertical"
                    class="form-control" autocomplete="off"
                    name="contact"
                    placeholder="Mobile"
                  />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="password-vertical">Emergency Contact #</label>
                  <input
                    type="text"
                    id="password-vertical"
                    class="form-control" autocomplete="off"
                    name="emergency_contact"
                    placeholder="Emergency Contact #"
                  />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="password-vertical">CNIC #</label>
                  <input
                    type="text"
                    id="password-vertical"
                    class="form-control delimiter-mask"
                    name="cnic"
                    placeholder="41300-5123121-1"
                  />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="password-vertical">Membership Type</label>
                  <select name="membership_type" id="membership_type" class="form-control" autocomplete="off" onchange="MembershipAmount(this.value,'{{route('membership.amount')}}')">
                      <option value="">Select</option>
                      @foreach ($membership as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                    <label for="password-vertical">Monthly Amount</label>
                    <input type="tel" name="amount" id="amount" readonly class="form-control" autocomplete="off" >
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                    <label for="password-vertical">Advance Amount</label>
                    <input type="tel" name="advance_amount" id="amount"  class="form-control" autocomplete="off" >
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                    <label for="password-vertical">Joining Date</label>
                    <input type="date" name="joining_date" id="amount"  class="form-control" autocomplete="off" >
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                    <label for="password-vertical">Address</label>
                    <input type="text" name="address" id="amount"  class="form-control" autocomplete="off" >
                </div>
              </div>
               
              
              <div class="col-12">
                  <div class="alert alert-danger alert-validation-msg print-error-msg" role="alert" style="display: none">
                <div class="alert-body">
                    <ul></ul>
                </div>
               </div>
                <button type="reset" class="btn btn-primary mr-1" onclick="VerifyLead('{{route('members.create')}}','ClassesAdd','{{route('members.index')}}')">Submit</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Basic Vertical form layout section end -->
<!--/ Basic table -->

@endsection


@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
@endsection


@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/forms/form-input-mask.js')) }}"></script>
  {{-- Page js files --}}
  <script src="{{asset('js/main.js')}}"></script>
  {{-- <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script> --}}
@endsection
