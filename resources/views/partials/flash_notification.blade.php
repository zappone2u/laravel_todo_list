@if(session()->has('flash_notification.message'))
    <div id="alert" class="alert alert-{{ session('flash_notification.level') }} .alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>

        {{ session('flash_notification.message') }}
    </div>

    <script type="text/javascript">
        setTimeout(function () {
            $('#alert').alert('close');
        }, 3000);
    </script>
@endif