# Codeignitor-encrypt-and-decrypt-with-openssl tested with codeignitor 3.*
an openssl codeignitor library to encrypt and decrypt alternative for mycrypt

put this class in your application/libraries folder

load it in your controller

 	public function __construct() {
      
     		 $this -> load -> library('Opensslencryptdecrypt');	
      
     	 }
      
 usage in class function   
 
  	$encrptopenssl =  New Opensslencryptdecrypt();
  
 	$plain_txt = "this is awsome";
  
	$testenc = $encrptopenssl->encrypt($plain_txt);  //encypting plain text
  
  	$testdec = $encrptopenssl->decrypt($testenc);    //decrypting plain texx
