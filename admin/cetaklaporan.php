<body onload=javascript:window:print()>
<?php include "../library/koneksi.php";?>
 <h2 align="center">Laporan Data Pasien</h2><hr>
<table width="100%" border="1" bordercolor="#000000">
      <tr bgcolor="#999999">
        <td valign="top"><strong>No.</strong></td>
        <td valign="top"><strong>Nama Lengkap</strong></td>
        <td><strong>Id pasien</strong></td>
        <td><strong>Umur</strong></td>
        <td><strong>Jenis Kelamin</strong></td>
        <td><div align="center"><strong>Aksi</strong></div></td>
      </tr>
	  	<? 
//panggil data dari tabel
$query = "SELECT * FROM user where level<>'admin'"; 
$result = mysql_query($query) or die('Error');
while($data = mysql_fetch_array($result))
{
//panggil data dari tabel, jadikan variabel
$no=$no+1;
?>
      <tr>
        <td valign="top"><? echo "$no"; ?></td>
        <td valign="top"><? echo "$data[nama_lengkap] " ; ?></td>
        <td><? echo "$data[id_user]" ;?></td>
        <td valign="top"><? echo "$data[umur] " ; ?></td>
        <td valign="top"><? echo "$data[jk]" ; ?></td>
        <td valign="top"><div align="center"><a href="userdelete.php?username=<? echo $data['id_user']; ?>">[HAPUS]</a></div></td>
      </tr>
          <?
 }
?>
      
    </table>
     
