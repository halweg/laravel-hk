@if (count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            {{ $error }}
        </div>
    @endforeach
@endif
