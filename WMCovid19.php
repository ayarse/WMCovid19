<?php

$url = 'https://www.worldometers.info/coronavirus/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_PROXY, '');
$data = curl_exec($ch);
curl_close($ch);

// To use a saved local copy of the page instead of fetching from the live website every time.
// $data = file_get_contents('./testPage.html'); 

$dom = new DOMDocument();
@$dom->loadHTML($data);

$xpath = new DOMXPath($dom);

$totalCases                = $xpath->query('//*[@id="maincounter-wrap"]/div/span'); 
$caseSummaries             = $xpath->query('//*[@class="number-table-main"]');
$numberOfCountriesXPATH    = $xpath->query('//h3[@id="countries"]/following-sibling::p/strong');
$countries                 = $xpath->query('//*[@id="main_table_countries_today"]/tbody[1]/tr');


preg_match('/^\d+/',$numberOfCountriesXPATH->item(1)->nodeValue, $numberOfCountries);

$parsed = [];

$parsed["total"] = [
    "cases"               => trim($totalCases[0]->nodeValue),
    "deaths"              => trim($totalCases[1]->nodeValue),
    "recovered"           => trim($totalCases[2]->nodeValue),
    "number_of_countries" => trim($numberOfCountries[0]),
    "active_cases"        => trim($caseSummaries[0]->nodeValue),
    "closed_cases"        => trim($caseSummaries[1]->nodeValue)
    ];

$parsed["countries"] = [];

foreach($countries as $tr)
{
    
    $td = $xpath->query('td', $tr);

    $parsed["countries"][] = [
        'country'         => trim($td->item(0)->nodeValue),
        'cases'           => trim($td->item(1)->nodeValue),
        'deaths'          => trim($td->item(3)->nodeValue),
        'recovered'       => trim($td->item(5)->nodeValue),
        'active_cases'    => trim($td->item(6)->nodeValue)
        ];
        
}

header('Content-Type: application/json');
echo json_encode($parsed, JSON_PRETTY_PRINT);

?>