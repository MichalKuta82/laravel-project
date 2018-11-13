@if(Session::has('comment'))
  <div class="col-md-8 alert alert-success text-center">{{session('comment')}}</div>
@endif
@if(Session::has('reply'))
  <div class="col-md-8 alert alert-success text-center">{{session('reply')}}</div>
@endif