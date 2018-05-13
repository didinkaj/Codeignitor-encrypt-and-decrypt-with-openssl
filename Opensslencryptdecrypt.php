<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 *
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 *
 */
class Opensslencryptdecrypt {
	
	public $encrypt_method = "AES-256-CBC";
	//these are test keys, you can be generate one at https://asecuritysite.com/encryption/keygen
	public $secret_key = 'EF61FE21EB90047086DED9A5386A8808'; //This is my secret key
	
	public $secret_iv = 'F148EB0B9C6A3E5B16A03FCBE949BAE8'; //This is my secret iv
	
	public $output = false;

	function encrypt($string) {

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);

		return $output;
	}

	function decrypt($string) {

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

		return $output;
	}

	public function test() {
		$plain_txt = "This is my plain text";
		echo "Plain Text =" . $plain_txt . "\n";

		$encrypted_txt = $this -> encrypt($plain_txt);
		echo "Encrypted Text = " . $encrypted_txt . "\n";

		$decrypted_txt = $this -> decrypt($encrypted_txt);
		echo "Decrypted Text =" . $decrypted_txt . "\n";

		echo $plain_txt === $decrypted_txt ? "SUCCESS" : "FAILED";

		echo "\n";
	}

}
?>