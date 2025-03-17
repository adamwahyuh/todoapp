const words = [
    "Hello guys!",
    "I use Arch btw",
    "💅💅💅💅Slay Queen💅💅💅💅",
    "Saya siapa?",
    "Sahooooorrrrrr!",
    "Commit jam 3 pagi",
    "No good music except from Nirvana",
];
function changeText() {
    const randomIndex = Math.floor(Math.random() * words.length);
    document.getElementById("randomText").innerText = words[randomIndex];
}
changeText();

setInterval(changeText, 3000);

function putar(){
    let putaran = document.getElementById('troll');

    putaran.classList.toggle('putar');
}
function kamuGelap(){
    let putaran = document.getElementById('whole');

    putaran.classList.toggle('kamu-gelap');
}

