<?php
if(isset($_GET['v'])) {
   if($_GET['v']=='logout'){
    unset($_SESSION);
    session_destroy();
    echo "<script type='text/javascript'>location.href='../index.php?mensaje=3'</script>";
   }
}
?>
