<?


	function findContractor($nip){
			
		$data = '
		
				{
					"api": {
						"contractors": {
							"parameters": {
								"conditions": {
									"condition": {
										"field": "nip",
										"operator": "eq",
										"value": "'.$nip.'"
									}
								}
							}


						}
					}
				}		
	
		';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api2.wfirma.pl/contractors/find?inputFormat=json&outputFormat=json');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_USERPWD, 'office@epado.com' . ':' . 'Epado2021');
		$r = curl_exec($ch);
		curl_close($ch);	

		$json = json_decode($r, true);
		
		$id = (int)$json['contractors'][0]['contractor']['id'];
		
		return $id;
		
		
	}
	
	
	echo findContractor($_GET['nip']);
	
	
?>