<?php

$hour = date('G');

if ($hour < 12) {
  $greeting = 'Good Morning!';
}
elseif ($hour < 18) {
  $greeting = 'Good Afternoon!';
}
else {
  $greeting = 'Good Evening!';
}
?>

<html>
    <head><title><?php print $greeting; ?></title></head>
    <body>
        <h1><?php print $greeting; ?></h1>
    </body>
</html>