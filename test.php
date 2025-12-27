<?php
$mt = password_hash("123456", PASSWORD_DEFAULT);
echo $mt;
$ps = '$2y$10$8S8GfS2C.hR7G.RjR.vX/eXyR0Hl0p1v2.3.4.5.6.7.8.9.0';
echo "<br>";
  $res = password_verify("123456",$ps);

  echo $res;
?>