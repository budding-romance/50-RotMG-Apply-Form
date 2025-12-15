<?php
header('Content-Type: application/json');
	$yourWebhookLink = "paste your discord webhook link here";
    $raw = file_get_contents("php://input");
    $rd = json_decode($raw, true);
    if (!$rd) {
        http_response_code(400);
        exit("Invalid JSON");
    }
    $player_info = [
        'ign'           => $rd['ign'],
        'private'       => $rd['private'],
        'verified'      => $rd['verified'],
        'code'          => $rd['code'],
        'characters'    => $rd['characters'] ?? "private",
        'skins'         => $rd['skins'] ?? "private",
        'exaltations'   => $rd['exaltations'] ?? "private",
        'fame'          => $rd['fame'] ?? "private",
        'rank'          => $rd['rank'] ?? "private",
        'account_fame'  => $rd['account_fame'] ?? "private",
        'guild'         => $rd['guild'] ?? "none",
        'guild_rank'    => $rd['guild_rank'] ?? "none",
        'first_seen'    => $rd['first_seen'] ?? "private",
        'last_seen'     => $rd['last_seen'] ?? "private",
        'description'   => $rd['description'],
        'discordUser'   => $rd['discordUser'],
        'discordUserID' => $rd['discordUserID'],
        'text1'         => $rd['text1'],
        'text2'         => $rd['text2'],
        'text3'         => $rd['text3'],
        'text4'         => $rd['text4'],
        'text5'         => $rd['text5']
    ]; 
    $st = $rd['rank'];
    $color = 0;
    if($st<18){
        $stars = $st.' <:lightblue:959549217167265842>';
        $color = 6449663;
    }else if($st<36&&$st>18){
        $stars = $st.' <:blue:959549217062408272>';
        $color = 1711871;
    }else if($st<54&&$st>36){
        $stars = $st.' <:red:959549217167269918>';
        $color = 16587033;
    }else if($st<72&&$st>54){
        $stars = $st.' <:orange:959549216760422532>';
        $color = 16742912;
    }else if($st<90&&$st>72){
        $stars = $st.' <:yellow:959549217175638036>';
        $color = 16776960;
    }else if($st==90){
        $stars = $st.' <:white:959549217985142894>';
        $color = 16645629;
    }
    $gr = $rd['guild_rank'];
    if(isset($rd['guild'])){
        if($gr=="Initiate"){
            $guild = $rd['guild'].' <:juke:958466205478449182>';
        }else if($gr=="Member"){
            $guild = $rd['guild'].' <:member:957690023757635594>';
        }else if($gr=="Officer"){
            $guild = $rd['guild'].' <:officer:957689914567303228>';
        }else if($gr=="Leader"){
            $guild = $rd['guild'].' <:leader:957689895093145772>';
        }else if($gr=="Founder"){
            $guild = $rd['guild'].' <:founder:957689540628336691>';
        }else if($gr=="none"){
            $guild = "none";
        }
    }

    if ($player_info['discordUserID'] == "everyone"){
        $player_info['discordUserID'] = "fuck you!";
        $player_info['verified'] = 0;
    }

    $realmeye = "https://www.realmeye.com/player/".$player_info['ign']."/";

    if ($player_info['private'] == 0 && $player_info['verified'] == 1){
        $webhook = $yourWebhookLink; 
        $data = [
            "content" => "",
            "embeds" => [
            [
                "title" => $player_info['ign'],
                "description" => "**Discord Username:** ".$player_info['discordUser']."\n**Discord User ID:** <@".$player_info['discordUserID'].">\n\n**Characters:** ".$player_info['characters']."\n**Exaltations:** ".$player_info['exaltations']." <:exaltation:968488902660853780>\n**Fame:** ".$player_info['fame']." <:fame:1058538731017089215>\n**Stars:** ".$stars."\n**Account Fame:** ".$player_info['account_fame']."\n**Guild:** ".$guild."\n**First Seen:** ".$player_info['first_seen']."\n**Last Seen:** ".$player_info['last_seen'],
                "url" => $realmeye,
                "color" => $color,
                "fields" => [
                    ["name" => "Describe yourself as a person.", "value" => $rd['text1'], "inline" => false],
                    ["name" => "Why would you be a great addition to the guild?", "value" => $rd['text2'], "inline" => false],
                    ["name" => "Do you use any hacked clients?", "value" => $rd['text3'], "inline" => false],
                    ["name" => "How often do you play the game?", "value" => $rd['text4'], "inline" => false],
                    ["name" => "Why do you wish to join our guild?", "value" => $rd['text5'], "inline" => false],
                ],
                "author" => [
                    "name" => $player_info['ign']." just applied to the guild.",
                    "icon_url" => "https://fifty.website/ico/user.png"
                ],
                "footer" => [
                    "text" => "fifty.website/apply",
                    "icon_url" => "https://fifty.website/img/logo.png"
                ],
                "timestamp" => gmdate("c")
                ]
            ]
        ];
        $ch = curl_init($webhook);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($data),
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $response = [
            "success" => true,
            "message" => "Data received"
        ];
        
        echo json_encode($response);
    }else{
        $response = [
            "success" => false,
            "message" => "something went wrong"
        ];
        
        echo json_encode($response);
    }
    
?>
