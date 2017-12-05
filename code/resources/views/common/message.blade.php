<?php
$message = session()->get(MESSAGE, null);
session()->forget(MESSAGE);
?>
@if($message)
    <script>
        alert("{{$message}}");
    </script>
@endif