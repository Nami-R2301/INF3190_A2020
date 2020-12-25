const liste = async () => {
    const reponse = await fetch('animaux.csv');
    let data = await reponse.text();
    const rows = data.split('\n').slice(1);
    const form = document.getElementById("animaux-dispo");
    let items = "";
    let compteur = 0;

    while(compteur !== 5) {

        let li = document.createElement('li');
        let selection = rows[Math.floor(Math.random()*rows.length)];
        let affichA = selection.split(',');

        if (affichA[1] !== "" && items.search(affichA[1]) === -1) {
            items += affichA[1];
            li.appendChild(document.createTextNode(affichA[1]));
            form.appendChild(li);
            compteur++;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    liste().then()
});