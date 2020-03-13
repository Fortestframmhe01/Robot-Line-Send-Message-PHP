<?php

	namespace LineNotify;

	ini_set('display_errors', 1);

	ini_set('display_startup_errors', 1);

	error_reporting(E_ALL);

	date_default_timezone_set("Asia/Bangkok");

	class LineNotify {
		public $_curl_api_url 			= 'https://notify-api.line.me/api/notify',
			   $_curl_ssl_verify_host 	= 0,
			   $_curl_ssl_verify_peer	= 0,
			   $_curl_post				= 1,
			   $_curl_post_fields		= '';
		
		protected $_line_token = '';

		public function setToken($lineToken = '') {
			$this->_line_token = $lineToken;
		}

		public function setMessage($lineMessage = '') {
			$this->_curl_post_fields .= $lineMessage;
		}

		public function lineSend() {
			if($this->_curl_post_fields == '' || $this->_line_token == '') {
				print("เกิดข้อผิดพลาด : ใส่ค่าพารามิเตอร์ในฟังก์ชั่น setMessage() หรือ setToken() ให้เรียบร้อย");
				die(0);
			} else {
				$lineCurl = curl_init(); 
				curl_setopt($lineCurl, CURLOPT_URL, $this->_curl_api_url); 
				curl_setopt($lineCurl, CURLOPT_SSL_VERIFYHOST, $this->_curl_ssl_verify_host); 
				curl_setopt($lineCurl, CURLOPT_SSL_VERIFYPEER, $this->_curl_ssl_verify_peer); 
				curl_setopt($lineCurl, CURLOPT_POST, $this->_curl_post); 
				curl_setopt($lineCurl, CURLOPT_POSTFIELDS, 'message=' . $this->_curl_post_fields); 

				$headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '. $this->_line_token .'',);
				curl_setopt($lineCurl, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt($lineCurl, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec($lineCurl);

				if(curl_error($lineCurl)) { 
					return false;
				} else { 
					return true;
				} 

				curl_close($lineCurl); 
			}
		}

	}
