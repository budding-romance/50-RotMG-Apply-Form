let playerInfo;
        let sent = 0;
        let appResult = {};
        appResult.y = "<p>Thank you for applying to 50!<br>Please, join our <a class='link' href='discord.gg/creatures'>Discord Server</a> to know if and when you're gonna get accepted </p>";
        appResult.n = "<p>Something went wrong!\nPlease try again later</p>";
        
        function code(){
            return document.getElementById("code").textContent.trim();
        }

        const sections = [
            "ap_1",
            "ap_2",
            "ap_3",
            "ap_4_0", // invalid ign or private or any error
            "ap_4_1", // no code
            "ap_4_2",
            "ap_5",
            "ap_e" // something broke completely. idfk how you would even trigger this tbh
        ];

        function hideAll() {
            sections.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.display = "none";
            });
        }

        function showSection(id) {
            hideAll();
            const el = document.getElementById(id);
            if (el) el.style.display = "block";
        }

        async function verifyIGN() {
            const ign = document.getElementById("ign").value.trim();
            if (!ign) return;
            try {
            const res = await fetch("parsed.php?ign=" + encodeURIComponent(ign) + "&code=" + encodeURIComponent(code()));
            const text = await res.text();
            playerInfo = JSON.parse(text);
            console.log(text);
            document.getElementById("meow").textContent = ign;
                if (!playerInfo['verified'] && !playerInfo['private']) {
                    // not verified but also not privated
                    showSection("ap_4_1");
                } else if (playerInfo['verified']){
                    showSection("ap_4_2");
                } else {
                    // private, invalid ign, any other error
                    showSection("ap_4_0");
                }
            } catch (e) {
                console.error(e);
                showSection("ap_4_1");
            }
        }
        async function replaceTheFunnyTextAtTheEnd(iDrankAbout6000mgOfCaffeineWhileRewritingThisThing){
            letsFindOutIf = document.getElementById("didtheygetinordidtheynot");
            if (iDrankAbout6000mgOfCaffeineWhileRewritingThisThing){
                letsFindOutIf.innerHTML = appResult.y;
            }else {
                letsFindOutIf.innerHTML = appResult.n;
            }
        }

        async function apply() {
            const x = playerInfo;
            x.discordUser = document.getElementById("discordUser").value.trim();
            x.discordUserID = document.getElementById("discordUserID").value.trim();
            x.text1 = document.getElementById("text1").value.trim();
            x.text2 = document.getElementById("text2").value.trim();
            x.text3 = document.getElementById("text3").value.trim();
            x.text4 = document.getElementById("text4").value.trim();
            x.text5 = document.getElementById("text5").value.trim();
            x.ign = document.getElementById("ign").value.trim();
            console.log(x);
            if (x.code == code() && x.verified && !sent){
                sent = 1;
                console.log('Sending...');
                try {
                    const res = await fetch('sendApply.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(x)
                    });
                    // has to be either true or false. otherwise only God may know what the fuck happened
                    const itfuckingwentthroughandworked = await res.json();
                    if(itfuckingwentthroughandworked.success || itfuckingwentthroughandworked.success === false){
                        console.log('Request went through...\nSent?: '+itfuckingwentthroughandworked.success);
                        replaceTheFunnyTextAtTheEnd(itfuckingwentthroughandworked.success);
                        showSection("ap_5");
                    }else{
                        showSection("ap_5");
                    }
                }catch (e){
                    console.error(e);
                    showSection("ap_5");
                }
                
            }else{
                showSection("ap_e");
            }
        }

        // attach click handlers to each section's <a>
        function setupNavigation() {
            sections.forEach((id, index) => {
            const section = document.getElementById(id);
            if (!section) return;

            const link = section.querySelector("a");
            if (!link) return;

            link.addEventListener("click", e => {
            e.preventDefault();
                if (id === "ap_3") {
                    verifyIGN();
                    return;
                }

                if (id === "ap_4_0" || id === "ap_4_1"){
                    showSection("ap_2");
                    return;
                }

                if (id === "ap_4_2"){
                    apply();
                    return;
                }

                const next = sections[index + 1];
                    if (next) showSection(next);
                });
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            hideAll();
            showSection("ap_1");
            setupNavigation();
        });