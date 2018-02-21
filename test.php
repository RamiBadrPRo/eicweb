<?php
$ch = curl_init("https://graph.facebook.com/ensak.informatics.club/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

// convert response
$output = json_decode($output);
var_dump($output);
// handle error; error output
if(curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200) {
  var_dump($output);
  curl_error($ch);
}

curl_close($ch);
 ?>
<script>

</script>
