<?php
$url = "https://discordapp.com/api/webhooks/ {your api key goes here }";
$headers = [ 'Content-Type: application/json; charset=utf-8' ];
$_POST["modeDetail"] = strtoupper($_POST["modeDetail"]);



$content = "$_POST[time]Z ";
$content .= "$_POST[fullCallsign] ";
$content .= "$_POST[frequency] ";
$content .= "$_POST[modeDetail] ";

if (isset($_POST['wwffRef'])) {
        $content .= "$_POST[wwffRef] ";
		$content .= "$_POST[wwffName] ";
}

if (isset($_POST['summitRef'])) {
        $content .= "$_POST[summitRef] ";
		$content .= "$_POST[summitName] ";
}

if (isset($_POST['iotaGroupRef'])) {
        $content .= "$_POST[iotaGroupRef] ";
		$content .= "$_POST[iotaGroupName] ";
}


$POST = [ 'username' => 'HamAlert', 'content' => "$content" ];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
$response   = curl_exec($ch);

?>
