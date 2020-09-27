@if (Session::has('flash'))
<div class="font-weight-bold alert alert-success mt-3" id="msg-flash">{{ Session::get('flash') }}</div>
@endif
