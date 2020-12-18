<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Ongkir_u_m");
	}

	public function cek_ongkir_helper()
	{
		$id_kota = $this->input->post("id");
		$courier = $this->input->post("courier");
		$berat = $this->input->post("berat");
		
		$shipping_kota_kabupaten = "";
		$shipping_courier_name = "";
		$shipping_info = $this->Ongkir_u_m->get_settings_shipping();
		foreach($shipping_info as $shipping_info)
		{
			$shipping_kota_kabupaten = $shipping_info->id_kecamatan;
			$shipping_courier_name = $shipping_info->courier_name;
		}
		
		$data_shipping = array(
							"origin_id" => $shipping_kota_kabupaten,
							"origin_type" => "subdistrict",
							"destination_id" => $id_kota,
							"destination_type" => "subdistrict",
							"weight" => $berat,
							"courier" => $courier,
						);
		$ongkir = $this->cek_ongkir($data_shipping);
		
		echo $ongkir;
	}
	
	public function cek_ongkir($data)
	{
		ini_set('max_execution_time', 30000); 

		$ongkir = 0;
		
		$origin = $data["origin_id"];
		$origintype = $data["origin_type"];

		$destination = $data["destination_id"];
		$destinationtype = $data["destination_type"];

		$weight = $data["weight"];;

		$courier = $data["courier"];;

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&originType=$origintype&destination=$destination&destinationType=$destinationtype&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"key: 3ed96b7290a9363b14f402023fe393b2"
			),
		));
		// starter : cdd8366bd3ff1c2828943a501afca3e5
		//pro : 3ed96b7290a9363b14f402023fe393b2

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		//echo $response;die();
		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
			if($courier == "jne")
				$ongkir = $this->handle_jne($response);
			if($courier == "tiki")
				$ongkir = $this->handle_tiki($response);
			if($courier == "pos")
				$ongkir = $this->handle_pos($response);
		}
		return $ongkir;
	}
	
	private function handle_jne($raw_response)
	{
		$someArray = json_decode($raw_response, true);
		foreach ($someArray as $key => $value) 
		{
			foreach ( $value["results"] as $key => $value2) 
			{
				$code = $value2["code"];
				$name = $value2["name"];
				
				/*
				echo"1. code: $code";
				echo"<br>";
				echo"2. name : $name";
				echo"<br>";
				echo"<br>";
				*/
				
				foreach ( $value2["costs"] as $key => $value3) 
				{
					$service = $value3["service"];
					$description = $value3["description"];
					
					/*
					echo"3. costs : $service -> $description";
					echo"<br>";
					*/
					
					if($service == "REG" | $service == "CTC")
					{
						foreach ( $value3["cost"] as $key => $value4) 
						{
							$cost = $value4["value"];
							$etd = $value4["etd"];
							
							/*
							echo"3. value : $cost -> $etd";
							echo"<br>";
							echo"<br>";
							*/
							
							$ongkir = $cost ;
						}
					}
				}
				//echo"<br>";
				//echo"<br>";
			}
		}
		return $ongkir;
	}
	
	private function handle_tiki($raw_response)
	{
		$someArray = json_decode($raw_response, true);
		foreach ($someArray as $key => $value) 
		{
			foreach ( $value["results"] as $key => $value2) 
			{
				$code = $value2["code"];
				$name = $value2["name"];
				
				/*
				echo"1. code: $code";
				echo"<br>";
				echo"2. name : $name";
				echo"<br>";
				echo"<br>";
				*/
				
				foreach ( $value2["costs"] as $key => $value3) 
				{
					$service = $value3["service"];
					$description = $value3["description"];
					
					/*
					echo"3. costs : $service -> $description";
					echo"<br>";
					*/
					
					if($service == "REG" | $service == "ECO")
					{
						foreach ( $value3["cost"] as $key => $value4) 
						{
							$cost = $value4["value"];
							$etd = $value4["etd"];
							
							/*
							echo"3. value : $cost -> $etd";
							echo"<br>";
							echo"<br>";
							*/
							
							$ongkir = $cost ;
						}
					}
				}
				//echo"<br>";
				//echo"<br>";
			}
		}
		return $ongkir;
	}
	
	private function handle_pos($raw_response)
	{
		$someArray = json_decode($raw_response, true);
		foreach ($someArray as $key => $value) 
		{
			foreach ( $value["results"] as $key => $value2) 
			{
				$code = $value2["code"];
				$name = $value2["name"];
				
				/*
				echo"1. code: $code";
				echo"<br>";
				echo"2. name : $name";
				echo"<br>";
				echo"<br>";
				*/
				
				foreach ( $value2["costs"] as $key => $value3) 
				{
					$service = $value3["service"];
					$description = $value3["description"];
					
					/*
					echo"3. costs : $service -> $description";
					echo"<br>";
					*/
					
					if($service == "Paketpos Biasa" || $service == "Paket Kilat Khusus")
					{
						foreach ( $value3["cost"] as $key => $value4) 
						{
							$cost = $value4["value"];
							$etd = $value4["etd"];
							
							/*
							echo"3. value : $cost -> $etd";
							echo"<br>";
							echo"<br>";
							*/
							
							$ongkir = $cost ;
						}
					}
				}
				//echo"<br>";
				//echo"<br>";
			}
		}
		return $ongkir;
	}
}
