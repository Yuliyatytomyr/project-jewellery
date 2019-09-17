@if(session('success_alert'))
    <script>
        $( document ).ready(function(){
            toastr.success("{{ session('success_alert') }}");
        });
    </script>
@endif
@if(session('error_alert'))
    <script>
        $( document ).ready(function(){
            toastr.error("{{ session('error_alert') }}");
        });
    </script>
@endif
@if(session('warning_alert'))
    <script>
        $( document ).ready(function(){
            toastr.warning("{{ session('warning_alert') }}");
        });
    </script>
@endif
