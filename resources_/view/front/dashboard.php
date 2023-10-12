<?php
session_start();

include_once __DIR__ . '/../layout/head.php'
?>

<body>
<header class="bg-dark text-light text-center py-4">
    <h1>Phone book dashboard</h1>
</header>

<?php

echo 'dashboard';
require_once __DIR__ . '/../scripts.php'
?>

</body>
</html>
