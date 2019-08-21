<?php
$json = file_get_contents(storage_path('json_language/language.json'));
$json_data = json_decode($json, true);
$resultMessage = [];

if ($json_data['EN'] == true && $json_data['JP'] == true) {
    foreach ($json_data['EN'] as $key => $value) {
        foreach ($json_data['EN'][$key] as $keyTitle => $valueTitle) {
            $resultMessage[$keyTitle] = $valueTitle;
        }
    }
}
return $resultMessage;

?>