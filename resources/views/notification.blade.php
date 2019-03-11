@if (Session::has('delete'))
  <div class="alert alert-warning-sm" style="width: 50%; background: #f0000f; color: #ffffff">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <p>{{ Session::get('delete') }}</p>
  </div>
@endif


@if (Session::has('success'))
  <div class="alert alert-success-sm" style="width: 50%; background: #002eee; color: #ffffff">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #ffffff">&times;</button>
      <p>{{ Session::get('success') }}</p>
  </div>
@endif
