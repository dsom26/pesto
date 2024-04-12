<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

    function encrypt_data($str) {
		return base64_encode($str);
	}

	function decrypt_data($str) {
		return base64_decode($str);
	}
}