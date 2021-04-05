@if (Session::has('flash'))
<div class="font-weight-bold alert mt-3 {{ Session::has('classname') ? Session::get('classname') : 'alert-success' }}" id="msg-flash">{{ Session::get('flash') }}</div>
@endif
