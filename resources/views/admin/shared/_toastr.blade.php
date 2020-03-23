@foreach (['toastr_danger', 'toastr_success', 'toastr_error'] as $msg)

    @if(session()->has($msg))

        <script>
            @if($msg == 'toastr_danger')
                toastr.warning({{ $msg }});
            @endif
            @if($msg == 'toastr_success')
                toastr.success({{ $msg }})
            @endif
            @if($msg == 'toastr_error')
                toastr.error({{ $msg }})
            @endif
        </script>
    @endif

@endforeach
