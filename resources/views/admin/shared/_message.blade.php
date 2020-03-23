@foreach (['danger', 'warning', 'success', 'info', 'message'] as $msg)
    @if(session()->has($msg))
        <div class="flash-message">
            <p class="alert alert-{{ $msg == 'message' ? 'danger' : $msg }}">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                {{ session()->get($msg) }}
            </p>
        </div>
    @endif
@endforeach
