<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/data_bank/api/bank/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/data_bank_client/bank.php\";</script>";
	}else{
		
		// print_r($_POST);
		// echo "Fafa";

		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<h3>Tambah Data Kos</h3>
<form class="form-horizontal" method="POST" action="http://localhost/data_bank_client/bank_tambah.php">
	Nama bank* <br/>
	<input type="text" placeholder="Nama bank" name="nama_bank" required/><br/>
	Jumlah uang* <br/>
	<input type="text" placeholder="jumlah uang" name="jumlah_uang" required/><br/>
	Tempat bank* <br/>
	<input type="text" placeholder="Tempat bank" name="tempat_bank" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>