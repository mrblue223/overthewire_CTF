<?php
$defaultdata = array("showpassword" => "no", "bgcolor" => "#ffffff");
$editedtdata = array("showpassword" => "yes", "bgcolor" => "#ffffff");

function xor_encrypt($in, $key) {
	$text = $in;
	$outText = '';

	// Iterate through each character
	for ($i = 0; $i < strlen($text); $i++) {
		$outText .= $text[$i] ^ $key[$i % strlen($key)];
	}

	return $outText;
}

print "Step 1 - Determine the value of the 'key' first!\n";
print xor_encrypt(base64_decode('HmYkBwozJw4WNyAAFyB1VUcqOE1JZjUIBis7ABdmbU1GIjEJAyIxTRg%3D'), json_encode($defaultdata)); // add your cookie here to find out the the xor key "eDWo"
print "\nThis is a repeating string... remove the repeating characters to come up with a unique key\n";
print "Take the output from Step 1, and provide it as the key value in the function below\n";
print "new cookie:\n";
print base64_encode(xor_encrypt(json_encode($editedtdata), 'eDWo')); // <- change it here get the new cookie 

?>
