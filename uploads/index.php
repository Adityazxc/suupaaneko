<?php
// Halaman ini akan menampilkan "Not Found" jika seseorang mencoba mengakses folder uploads.
header("HTTP/1.0 404 Not Found");
echo "<h1>404 Not Found</h1>";
echo "<p>Sorry, the requested file cannot be accessed.</p>";
exit;
