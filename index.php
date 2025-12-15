<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>50 - Apply Form</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="/img/logo.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=UnifrakturCook:wght@700&display=swap" rel="stylesheet">

        <!-- Embed Stuff :3c -->
        <meta property="og:image" content="https://fifty.website/img/logo.png"> 
        <meta name="theme-color" content="#fcbdf4"> 
        <meta name="twitter:description" content="Website made for a Realm of the Mad God guild - 50. Here you can find useful tools such as Daily Rewards Relogger, Free Box Collector, Friend Requester, Name Checker and an Interactive Guild Apply Form."> 
        <meta property="og:description" content="Website made for a Realm of the Mad God guild - 50. Here you can find useful tools such as Daily Rewards Relogger, Free Box Collector, Friend Requester, Name Checker and an Interactive Guild Apply Form.">
        <meta property="og:site_name" content="fifty.website ~ created and maintained by buddingromance"> 
        <meta name="twitter:site" content="fifty.website ~ created and maintained by buddingromance">
        <link type="application/json+oembed" href="https://fifty.website/em2.json">
        <meta content="https://fifty.website/" property="og:url" />
        <meta name="description" content="Website made for a Realm of the Mad God guild - 50. Here you can find useful tools such as Daily Rewards Relogger, Free Box Collector, Friend Requester, Name Checker and an Interactive Guild Apply Form.">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/scripts/apply.js"></script>
    <link rel="stylesheet" href="/css/apply.css">
    <link rel="stylesheet" href="/css/banners.css">
    <script src="/scripts/titleShenanigans.js"></script>
</head>

<body style="background-color:black; color:white;">
    <div class="fixed-banner">
        <pre style='font-size:5px;'>
        <span class="bnr" style='color:#F00000;cursor:not-allowed;'>▄▄▄▄    █    ██ ▓█████▄ ▓█████▄  ██▓ ███▄    █   ▄████  ██▀███   ▒█████   ███▄ ▄███▓ ▄▄▄       ███▄    █  ▄████▄  ▓█████ </span>
        <span class="bnr" style='color:#E00000;cursor:not-allowed;'>▓█████▄  ██  ▓██▒▒██▀ ██▌▒██▀ ██▌▓██▒ ██ ▀█   █  ██▒ ▀█▒▓██ ▒ ██▒▒██▒  ██▒▓██▒▀█▀ ██▒▒████▄     ██ ▀█   █ ▒██▀ ▀█  ▓█   ▀ </span>
        <span class="bnr" style='color:#D00000;cursor:not-allowed;'>▒██▒ ▄██▓██  ▒██░░██   █▌░██   █▌▒██▒▓██  ▀█ ██▒▒██░▄▄▄░▓██ ░▄█ ▒▒██░  ██▒▓██    ▓██░▒██  ▀█▄  ▓██  ▀█ ██▒▒▓█    ▄ ▒███   </span>
        <span class="bnr" style='color:#C00000;cursor:not-allowed;'>▒██░█▀  ▓▓█  ░██░░▓█▄   ▌░▓█▄   ▌░██░▓██▒  ▐▌██▒░▓█  ██▓▒██▀▀█▄  ▒██   ██░▒██    ▒██ ░██▄▄▄▄██ ▓██▒  ▐▌██▒▒▓▓▄ ▄██▒▒▓█  ▄ </span>
        <span class="bnr" style='color:#B00000;cursor:not-allowed;'>░▓█  ▀█▓▒▒█████▓ ░▒████▓ ░▒████▓ ░██░▒██░   ▓██░░▒▓███▀▒░██▓ ▒██▒░ ████▓▒░▒██▒   ░██▒ ▓█   ▓██▒▒██░   ▓██░▒ ▓███▀ ░░▒████▒</span>
        <span class="bnr" style='color:#A00000;cursor:not-allowed;'>░▒▓███▀▒░▒▓▒ ▒ ▒  ▒▒▓  ▒  ▒▒▓  ▒ ░▓  ░ ▒░   ▒ ▒  ░▒   ▒ ░ ▒▓ ░▒▓░░ ▒░▒░▒░ ░ ▒░   ░  ░ ▒▒   ▓▒█░░ ▒░   ▒ ▒ ░ ░▒ ▒  ░░░ ▒░ ░</span>
        <span class="bnr" style='color:#900000;cursor:not-allowed;'>▒░▒   ░ ░░▒░ ░ ░  ░ ▒  ▒  ░ ▒  ▒  ▒ ░░ ░░   ░ ▒░  ░   ░   ░▒ ░ ▒░  ░ ▒ ▒░ ░  ░      ░  ▒   ▒▒ ░░ ░░   ░ ▒░  ░  ▒    ░ ░  ░</span>
        <span class="bnr" style='color:#800000;cursor:not-allowed;'> ░    ░  ░░░ ░ ░  ░ ░  ░  ░ ░  ░  ▒ ░   ░   ░ ░ ░ ░   ░   ░░   ░ ░ ░ ░ ▒  ░      ░     ░   ▒      ░   ░ ░ ░           ░   </span>
        <span class="bnr" style='color:#700000;cursor:not-allowed;'> ░         ░        ░       ░     ░           ░       ░    ░         ░ ░         ░         ░  ░         ░ ░ ░         ░  ░</span>
        <span class="bnr" style='color:#600000;cursor:not-allowed;'>      ░           ░       ░                                                                               ░               </span>
        </pre>
    </div>
    <?php
    //  generates a unique verification code. 
        function generateRandomString($length = 10)
        {
            $characters = '0123456789abcdef';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        $verify = '50GANG' . generateRandomString();
    ?>

    <section>
        <!-- Apply Form -->
        <div id="ap_1">
            <h2>Hello there!</h2>
            <p>Thank you for choosing 50!</p>
            <p>Before we begin, we need to verify your in-game account via RealmEye.</p>
            <p>If you're comfortable with setting your profile to public for the duration of this, please do so.</p>
            <a href="#" class="link">Continue.</a>
        </div>
        <div id="ap_2">
            <h2>Step 1:</h2>
            <input type="text" name="ign" id="ign" placeholder="Enter your IGN here.">
            <br><br>
            <a href="#" class="btn">Done!</a>
        </div>
        <div id="ap_3">
            <h2>Step 2:</h2>
            <p>For verification purposes, enter this code in your RealmEye description</p>
            <p id="code"><?php echo $verify; ?></p>
            <a href="#" class="btn">I have entered the code AND waited at least 2 minutes for RealmEye to update my bio.</a>
        </div>
        <!-- CASE 0: -->
        <!-- The user did not unprivate their RealmEye profile -->
        <div id="ap_4_0">
            <h2>Something went wrong...</h2>
            <p>Your RealmEye profile is still set to private,</p>
            <p>or you've entered an invalid username.</p>
            <a href="#" class="btn">Try again.</a>
        </div>
        <!-- CASE 1: -->
        <!-- Code ain't there. User error/RealmEye sucks dick as expected -->
        <div id="ap_4_1">
            <h2>Something went wrong...</h2>
            <p>
                You've either entered an invalid IGN (<span id="meow">IGN</span>)
                Please, wait ~2 minutes and try again.
                <br>

            </p>
            <p>If that doesn't work, come back later.</p>
            <a href="#" class="btn">Try again.</a>
        </div>
        <!-- CASE 2: -->
        <!-- Surprisingly, it worked. Almost as if it should've... -->
        <div id="ap_4_2">
            <h2>Step 3:</h2>
            <p>Thanks <span id="meow">IGN</span>, everything checks out!</p>
            <p>Now let's get to know you a little better.</p>
            <p>Enter your Discord <abbr title="We need your username, NOT your display name">Username</abbr> here:</p>
            <input type="text" id="discordUser">
            <p>Enter your Discord User ID</p>
            <p>(Right click your profile - Copy User ID)</p>
            <input type="text" id="discordUserID">
            <p>Describe yourself as a person.</p>
            <textarea name="text1" id="text1" cols="30" rows="10"></textarea>
            <p>Why would you be a great addition to the guild?</p>
            <textarea name="text2" id="text2" cols="30" rows="10"></textarea>
            <p>Do you use any hacked clients?</p>
            <textarea name="text3" id="text3" cols="30" rows="10"></textarea>
            <p>How often do you play the game?</p>
            <textarea name="text4" id="text4" cols="30" rows="10"></textarea>
            <p>Why do you wish to join our guild?</p>
            <textarea name="text5" id="text5" cols="30" rows="10"></textarea>
            <a href="#" class="btn">Submit</a>
        </div>
        <div id="ap_5"> 
            <p><span id="didtheygetinordidtheynot">Something broke. Like, actually broke.......<br>check console pls n lmk what happened</span></p>
            <a href="https://discord.gg/creatures" class="btn">Join our Discord Server!</a>
        </div>
        <div id="ap_e">
            <p>you broke it.</p>
            <p>congratulations.</p>
        </div>
    </section>
    <div class="footer">
        <h1>fifty.website</h1>
    </div>
</body>
</html>