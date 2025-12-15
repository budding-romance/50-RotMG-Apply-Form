let fuckingLetterTimeToAdditionVariable = 300;
let titleLength = 0;
let originalTitle = document.title;

function recursiveAnimateTitle(string) {
    let titleElement = document.querySelector('title');

    titleElement.innerHTML += string[0];

    if (string.length > 1) {
        setTimeout(() => {
            recursiveAnimateTitle(string.substring(1));
        }, fuckingLetterTimeToAdditionVariable);
    }
}

function animateTitle(string) {
    titleLength = string.length;
    document.querySelector('title').innerHTML = "";
    recursiveAnimateTitle(string);
    setTimeout(() => {
        setInterval(() => {
            let t = document.title;
            document.title = (t ===  string ? string + " |" : string); // blinking :3c
        }, fuckingLetterTimeToAdditionVariable + 150);
    }, titleLength * fuckingLetterTimeToAdditionVariable + 200);
}

animateTitle(originalTitle);
