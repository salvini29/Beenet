@if(session('success'))
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "{{ Session::get('success') }}",
                    showConfirmButton: true,
                    timer: 3000
                });
            }
        );
    </script>
@endif

@if(session('failed'))
    <script type="text/javascript">
        $(document).ready(
            function(e) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "{{ Session::get('failed') }}",
                    showConfirmButton: true,
                    timer: 3000
                });
            }
        );
    </script>
@endif

