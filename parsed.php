<?php
header('Content-Type: application/json');
include('simple_html_dom.php');

$code;
    if(isset($_GET['code'])){
        $code = $_GET['code'];
    }
$prefix = "50GANG"; // change this if you're using any other verification code generation shit

$context = stream_context_create(array(
    'http' => array(
        'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
    ),
));

// debugging: $url = "https://realmeye.com/player/SamRiddeli/"; 
    $url = "https://realmeye.com/player/".$_GET['ign']."/"; 
    $html = str_get_html(file_get_contents($url, false, $context));

// Check if the user has set their profile to public
    $isPrivate = 0;
    $privateStr = $html->find("h2",0);
    if (str_contains($privateStr, "Sorry, but we either:")){
        $isPrivate = 1;
    }

// Parse Description
    $serverError = $html->find("div",10);
    if(str_contains($serverError,"We currently cannot access the server")){
        $d = $html->find("div",18);
    }else{
        $d = $html->find("div",17);
    }
    $description = strip_tags($d);
    $verified = 0;
    if (str_contains($description, $code) && $code != null && str_contains($code, $prefix)){
        $verified = 1;
    }

//  Scraping all player info
/*  td:    td_even       td_uneven
================================================================
    0,1    Characters    18
    2,3    Skins         111 (placement)
    4,5    Exaltations   111 (placement)
    6,7    Fame          1 111 111 (placement)
    8,9    Rank          90
    10,11  Account fame  1 111 111(placement)
    12,13  Guild         50
    14,15  Guild Rank    Founder
    16,17  First seen    ~3 years and 85 days ago
    18,19  Last seen     2 days ago at EUNorth Nexus as Huntress
================================================================
    This order is what we ideally want.
    Not all users will be willing to unprivate everything tho x)
*/
    $player_info = [
        'private'       => $isPrivate,
        'verified'      => $verified,
        'code'          => $code,
        'characters'    => null,
        'skins'         => null,
        'exaltations'   => null,
        'fame'          => null,
        'rank'          => null,
        'account_fame'  => null,
        'guild'         => null,
        'guild_rank'    => null,
        'first_seen'    => null,
        'last_seen'     => null,
        'description'   => $description
    ];
    // +=2 cuz of the explanation above.
    for ($i = 0; $i <= 18; $i += 2) {
        $label_td = $html->find('td', $i);
        $value_td = $html->find('td', $i + 1);
    
        if (!$label_td || !$value_td) continue;
    
        $label = trim($label_td->plaintext);
        $value = trim($value_td->plaintext);
    
        // Map the thing to the thing
        switch ($label) {
            case 'Characters':
                $player_info['characters'] = $value;
                break;
            case 'Skins':
                if (preg_match('/\d+/', $value, $matches)) {
                    $clean_value = $matches[0];
                } else {
                    $clean_value = 0;
                }
                $player_info['skins'] = $clean_value;
                break;
            case 'Exaltations':
                if (preg_match('/\d+/', $value, $matches)) {
                    $clean_value = $matches[0];
                } else {
                    $clean_value = 0;
                }
                $player_info['exaltations'] = $clean_value;
                break;
            case 'Fame':
                if (preg_match('/\d+/', $value, $matches)) {
                    $clean_value = $matches[0];
                } else {
                    $clean_value = 0;
                }
                $player_info['fame'] = thousandsCurrencyFormat($clean_value);
                break;
            case 'Rank':
                $player_info['rank'] = $value;
                break;
            case 'Account fame':
                if (preg_match('/\d+/', $value, $matches)) {
                    $clean_value = $matches[0];
                } else {
                    $clean_value = 0;
                }
                $player_info['account_fame'] = thousandsCurrencyFormat($clean_value);
                break;
            case 'Guild':
                $player_info['guild'] = $value;
                break;
            case 'Guild Rank':
                $player_info['guild_rank'] = $value;
                break;
            case 'First seen':
                $player_info['first_seen'] = $value;
                break;
            case 'Last seen':
                $player_info['last_seen'] = $value;
                break;
        }
    }

function thousandsCurrencyFormat($f) {
    if($f>1000) {
          $x = round($f);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('k', 'm', 'b', 't');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
          $x_display .= $x_parts[$x_count_parts - 1];
  
          return $x_display;
    }
    return $f;
  }
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

echo json_encode($player_info);
?>