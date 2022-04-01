@if(session('message') != null)
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-info"></i> <b>Informasi!!</b> : {{ session('message')}}
</div>
@endif