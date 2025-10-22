const body = document.getElementsByTagName("body")[0];

function setColor(name) {
    body.style.background = "";
    body.style.backgroundColor = name;
}

function randomColor() {
    const red1 = Math.round(Math.random() * 255);
    const green1 = Math.round(Math.random() * 255);
    const blue1 = Math.round(Math.random() * 255);
    const randomColor1 = `rgb(${red1}, ${green1}, ${blue1})`;

    const red2 = Math.round(Math.random() * 255);
    const green2 = Math.round(Math.random() * 255);
    const blue2 = Math.round(Math.random() * 255);
    const randomColor2 = `rgb(${red2}, ${green2}, ${blue2})`;

    body.style.background = `linear-gradient(to right, ${randomColor1}, ${randomColor2})`
}