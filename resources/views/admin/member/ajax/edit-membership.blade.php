<div class="form-group">
    <label class="form-label" for="basic-icon-default-fullname">Membership Name</label>
    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe"
        aria-label="John Doe" name="name" autocomplete="off" value="{{$data->name}}"/>
</div>
<div class="form-group">
    <label class="form-label" for="basic-icon-default-fullname">Membership Amount</label>
    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="10"
        aria-label="John Doe" name="amount" autocomplete="off"  value="{{$data->amount}}"/>
</div>
<input type="hidden" name="post_id" value="{{$data->id}}">
