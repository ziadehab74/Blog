<?php
session_start();
    // print_r($_SESSION);
    if(isset($_SESSION['error'])){
    print_r($_SESSION['error']);

echo "
<script> 
new Noty({
    theme: 'sunset'
    type: 'success',
    layout: 'topRight',
    text: 'Some notification text'
    timeout: 3000
}).show();
</script>";
unset($_SESSION['error']);
}
?>