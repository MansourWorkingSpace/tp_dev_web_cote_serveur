<?php
    $link = mysqli_connect('localhost', 'root', '', 'test');
    $supcin=$_GET["supcin"];
    $result= mysqli_query($link, "DELETE FROM `personne` WHERE cin=$supcin");
    mysqli_close($link);
?>