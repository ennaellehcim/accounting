<?php
	function ci(){ return get_instance(); }

	function load_data($data = array()){
		$site_info =  array(
			'site_title' => ci()->config->item('site_title') 
		);

		$user_info = array(
			'fullname' 			=> ci()->session->userdata('fullname'),
			'project_name' 		=> ci()->session->userdata('project_name')
			// 'access'	 => ci()->model->select_query("select * from tb_systemuser_keyaccess where id=".ci()->session->userdata('userid')."")->result_array()
		);
		return array_merge(array_merge($site_info,$user_info),$data);
	}

	function jcode($data){
		header('Content-type: application/json');
		return json_encode($data);
	}

	function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

    function dateDiff ($d1, $d2) {
	// Return the number of days between the two dates:

	  return round(abs(strtotime($d1)-strtotime($d2))/86400) ;

	}  

    function validates($param,$exemption){
		$err = array();
		foreach ($param as  $value) { /// Check post array for null value validation
			foreach ($value as  $pkey => $values) {	
					if (empty($values)) {
						if (!in_array($pkey, $exemption)) {
							$err[] = $pkey;
						}
					}				
			}
		}		
		return $err;
	}

	function age($date){	
		return date_diff(date_create($date), date_create('today'))->y;
	}

	function encrypt_id($data) { //numbers only
		$key = "&/ASD%g/..&FWSF2csvsq2we!%%";
		$base64_safe=true;
		$shrink=true;
        if ($shrink) $data = base_convert($data, 10, 36);
        $data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
        if ($base64_safe) $data = str_replace('=', '', base64_encode($data));
        return $data;
	}

	function decrypt_id($data) {	//numbers only
		$key = "&/ASD%g/..&FWSF2csvsq2we!%%";
		$base64_safe=true;
		$expand=true;
	    if ($base64_safe) $data = base64_decode($data.'==');
	    $data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
	    if ($expand) $data = base_convert($data, 36, 10);
	    return $data;
	}

	function delete_file($file){
		unlink($file);
	}
?>
