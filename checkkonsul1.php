<?php
include "library/koneksi.php";
session_start();
$tgl= date('d-m-Y');
$sql = mysqli_query("SELECT * FROM user where id_user='$_SESSION[namauser]'");
$hasil=mysqli_fetch_array($sql);

echo "<table width=78%><tr><td align='right'>$tgl</td></tr></table>";

echo "Id Pasieneses : $hasil[id_user] <br>
Nama Pasien : $hasil[nama_lengkap] <br>";
echo "Umur : $hasil[umur] Thn <br>";
echo "Tinggi Badan : $hasil[tinggi_badan]<br>";
echo "Berat Badan : $hasil[berat_badan]<br>";
// =========================================================================================================== PENYAKIT  
echo "<br><br>Gejala yang anda derita :<br>";
$query51 = mysqli_query("SELECT * FROM tblkonsultasi where id_pasien= '$_GET[id]' order by id desc "); 
$data51 = mysqli_fetch_array($query51);
$cekk=$data51['id_tingkatgizi'];

$query31 = "SELECT * FROM detailkonsul where idkonsul= '$data51[id]' "; 
$result31 = mysqli_query($query31) or die('Error');
while($data31 = mysqli_fetch_array($result31))
{
//panggil data dari tabel, jadikan variabel
$idkon= $data31['idgejala'] ;


$query3 = "SELECT * FROM tblgejala where idgejala= '$idkon' "; 
$result3 = mysqli_query($query3) or die('Error');
while($data3 = mysqli_fetch_array($result3))
{
//panggil data dari tabel, jadikan variabel
$b= $data3['namagejala'] ;
$no=$no+1; 

echo "$no. $b <br>" ; 


}}

 
$query3 = "SELECT * FROM tbltingkat_gizi where id_tingkatgizi = '$cekk' "; 
$result3 = mysqli_query($query3) or die('Error');
while($data3 = mysqli_fetch_array($result3))
{
//panggil data dari tabel, jadikan variabel
$nama_tingkatgizi= $data3['nama_tingkatgizi'] ;
$ket= $data3['keterangantingkatgizi'] ;
}
echo "<br>Gangguan yang anda derita : ";
echo "$nama_tingkatgizi <br>
<strong>Dari gejala tersebut anda tergolong tingkat gizi dengan tingkat keyakinan $data51[persen] %</strong><br>";

echo "<br><strong>Solusi : </strong><br>  ";


if ($data51[persen]<'25') 	{
		$query3 = "SELECT * FROM tblsolusi where idsolusi = 'S2' or idsolusi = 'S5' "; 
		}
if ($data51[persen]>='25' and $data51[persen]<'50') 	{
		$query3 = "SELECT * FROM tblsolusi where idsolusi = 'S2' or idsolusi = 'S5' or idsolusi = 'S4' "; 
		}
if ($data51[persen]>='50' and $data51[persen]<'75') 	{
		$query3 = "SELECT * FROM tblsolusi where idsolusi = 'S2' or idsolusi = 'S5' or idsolusi = 'S4' or idsolusi = 'S1' "; 
		}
if ($data51[persen]>='75' and $data51[persen]<='100') 	{
		$query3 = "SELECT * FROM tblsolusi where idsolusi = 'S2' or idsolusi = 'S5' or idsolusi = 'S4' or idsolusi = 'S1' or idsolusi = 'S3' "; 
		}
		
$result3 = mysqli_query($query3) or die('Error');
while($data3 = mysqli_fetch_array($result3))
{
//panggil data dari tabel, jadikan variabel
$vnamasolusi= $data3['namasolusi'] ;
$vketerangan= $data3['keterangansolusi'] ;
$noo=$noo+1;echo "$noo. ";
echo "$vketerangan <br>";

}


echo "<a href='hasil.php?id_tingkatgizi=".($cekk)."&nama_tingkatgizi=".($nama_tingkatgizi)."&id=".($_GET['id'])."' target='_blank'> 
CETAK </a>";


?>
