<?php
session_start();
session_destroy();
 header("location:signin.php");
?>
<script>
alert("Loging you out");
window.open("index.php","self");
</script>
