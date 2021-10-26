<?php
echo "<head><title>Hasil Data</head></title>";
$fp = fopen("hasil.txt", "r");
echo "<table border=0>";
while ($isi = fgets($fp, 80)) {
    $pisah = explode("|", $isi);
    echo "<tr><td>Nama</td><td>:$pisah[0]</td></tr>";
    echo "<tr><td>Email</td><td>:$pisah[1]</td></tr>";
    echo "<tr><td>Website</td><td>:$pisah[2]</td></tr>";
    echo "<tr><td>Komentar</td><td>:$pisah[3]</td></tr>";
    echo "<tr><td>Gender</td><td>:$pisah[4]</td></tr>
        <tr><td>&nbsp;<hr></td><td>&nbsp;<hr></td></tr>";
}
echo "</table>";
echo "<a href=validasi.php>Go To Form</a><br>";
