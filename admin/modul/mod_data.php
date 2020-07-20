<?php ?>
 <h2>Daftar Konsultasi</h2><hr>
 <a href="modul/cetak.php" target="_blank">Cetak Konsultasi</a>
<table width="580" border="1">
  <tr>
    <th width="24">No</th>
    <th width="50">Tgl</th>
    <th>Nama Lengkap</th>
    <th>Umur</th>
    <th>JK</th>
    <th>Gejala</th>
    <th>Penyakit</th>
    <th>Aksi</th>
  </tr>
  <?php 
  $pertanyaan=mysql_query("SELECT * FROM tblkonsultasi");
  $no=0;
  while ($r=mysql_fetch_array($pertanyaan))
  { $no++;
  
  $pas=mysql_query("SELECT * FROM user where id_user='$r[id_pasien]'");
  $rp=mysql_fetch_array($pas);

  $pas1=mysql_query("SELECT * FROM tblgangguan where idgangguan='$r[id_gangguan]'");
  $rp1=mysql_fetch_array($pas1);
  
  
  ?>
  <tr valign="top">
    <td><?php echo"$no";?></td>
    <td><?php echo"$r[tgl]";?></td>
    <td><?php echo"$rp[nama_lengkap]";?></td>
    <td><?php echo"$rp[umur]";?></td>
    <td><?php echo"$rp[jk]";?></td>
    <td>
	<?php 
		$querygx = "SELECT * FROM detailkonsul where idkonsul='$r[id]' "; 
			$resultgx = mysql_query($querygx) or die('Error');
			while($datagx = mysql_fetch_array($resultgx))
			{

		$queryg = "SELECT * FROM tblgejala where idgejala='$datagx[idgejala]' "; 
			$resultg = mysql_query($queryg) or die('Error');
			while($datag = mysql_fetch_array($resultg))
			{
			echo"$datag[namagejala],";
			} }  ?>	</td>
    <td><?php echo"$rp1[namagangguan] ($r[persen] %)";?></td>
    <td><?php echo "<a href=./aksi.php?module=datakonsul&act=hapus&id=$r[id]>Hapus</a>";?></td>
  <?php }?>
</table>

