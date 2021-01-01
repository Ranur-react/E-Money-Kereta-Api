<?php 
include 'koneksi.php';
	
if (isset($_GET['data1'])&isset($_GET['data2'])) {
	# code...
	$id=$_GET['data1'];
	$units=$_GET['data2'];
}else{
	$id=0;
}

$tbview = mysqli_query($conn,"SELECT * FROM `tb_kartu` where id_card='$id' ");
if ($res=mysqli_fetch_array($tbview)) {
	# code...
	 $saladoawal=$res[4];
	 $tot=$saladoawal-$units;
	 $update= mysqli_query($conn,"UPDATE `tb_kartu` SET `value` = '$tot' WHERE  id_card='$id';");
echo "HIGH";
	 $file="HIGH.txt";
	 fwrite(fopen($file, "w"), "$tot");
} 
else {
	 
	 $file="HIGH.txt";
	 fwrite(fopen($file, "w"), "GAK MASUK");
// 	 header('location:'.$file);
echo "LOW";
    
}

	
?>