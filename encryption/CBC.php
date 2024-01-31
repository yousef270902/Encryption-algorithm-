<html>
<body>
<link rel="stylesheet" href="radio.css">
<center> 
<button class="btn-shine" onclick="plaintext()" name="encrypt"> <span>encrypt</span></button>
<br>
<form action="" method="post">
<input type="text" name="plaintext" placeholder="Enter Your PlainText" class="plain" id="plain">
<br>
<br>
<button class="btn-shine"  name="submit" onclick="display()"> <span>submit</span></button>
<br>
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["submit"]))
{
function encrypt_cbc($plaintext, $key) {
$iv = openssl_random_pseudo_bytes(8);
$ciphertext = openssl_encrypt($plaintext, 'des-cbc', $key, OPENSSL_RAW_DATA, $iv);
return $iv . $ciphertext;
}
$key = 'secretkey';
$plaintext=$_POST["plaintext"];
$encrypted_data = encrypt_cbc($plaintext, $key);
 echo "<center>".base64_encode($encrypted_data) ."</center>";
}
?>
<br>
<br>
<button class="btn-shine" onclick="ciphertext()" name="decrypt"> <span>decrypt</span></button>
<br>
<br>
<br>
<form action="" method="post">
<input type="text" name="Ciphertext" placeholder="Enter Your CipherText" class="cipher" id="cipher">
<br>
<br>
<button class="btn-shine"  name="submitt" onclick="display()"> <span>submit</span></button>
<br>
</form>
<br>
<?php
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST["submitt"]))
{
  function decrypt_cbc($ciphertext, $key) {
$iv = substr($ciphertext, 0, 8);
$ciphertext = substr($ciphertext, 8);
$plaintext = openssl_decrypt($ciphertext, 'des-cbc', $key, OPENSSL_RAW_DATA, $iv);
return $plaintext;
}
$key = 'secretkey';
$plaintext=$_POST["Ciphertext"];
$decrypted_data = decrypt_cbc(base64_decode($plaintext), $key);
echo "Decrypted: $decrypted_data\n";
}
?>
<br>
<br>
</center>
<script src="script.js"></script>
<center>
</center>
</body>
</html>