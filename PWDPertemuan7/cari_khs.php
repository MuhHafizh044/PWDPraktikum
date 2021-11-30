<?php
include "../PWDPertemuan3/koneksi.php";
?>

<h3>Form Pencarian Data KHS PHP</h3>

<form action="" method="get">
    <label>Cari : </label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Kode MK</th>
        <th>Nilai</th>
    </tr>

    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "select * from khs where nim like '%" . $cari . "%'";
        $tampil = mysqli_query($con, $sql);
    } else {
        $sql = "select * from khs";
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['nim']; ?></td>
            <td><?php echo $r['kodemk']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>
</table>