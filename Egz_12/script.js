function oblicz() {
    let wynik = document.getElementById("wynik");
    let cena = 0;

    const peeling = document.getElementById('peeling');
    const maska = document.getElementById('maska');
    const masaz = document.getElementById('masaz');
    const makijaz = document.getElementById('makijaz');

    if(peeling.checked) {
        cena = cena + 45;
    }

    if(maska.checked) {
        cena = cena + 30;
    }

    if(masaz.checked) {
        cena = cena + 20;
    }

    if(makijaz.checked) {
        cena = cena + 50;
    }

    wynik.innerHTML = "<p>Cena zabiegów: " + cena + "</p>";
}