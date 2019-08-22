<?php
$json = file_get_contents(storage_path('json_language/language_project.json'));
$json_data = json_decode($json, true);
$resultMessage = [];

if ($json_data['EN'] == true && $json_data['JP'] == true) {
    foreach ($json_data['EN'] as $key => $value) {
        $resultMessage[$key] = $value;
    }
}
return $resultMessage;

?>