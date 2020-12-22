let reg = new RegExp('\,')


function validerCourriel() {
    let valide = true;
    let msgE = "\t"
    return valide;
}

function validerAdresse() {
    let valide = true;
    return valide;
}

function validateForm() {
    const form = document.querySelector('form');
    let valide = true;
    let msgText = "\tCe champs ne peut pas être vide ou avoir des virgules!".fontcolor("RED");
    let msgNmb = "\tL'âge doit être une valeur numérique entre 0 et 30!".fontcolor("RED");
    let msgLength = "\tLe nom de l'animal doit avoir entre 3 et 20 caractères!".fontcolor("RED");
    for ( let i = 0; i < 7; ++i ) {
        document.getElementById( "E" + form.elements[i].id ).innerHTML = "";
        if ( form.elements[i].value === "" || form.elements[i].value.search(reg) !== -1 ) {
            valide = false;
            document.getElementById( "E" + form.elements[i].id ).innerHTML = msgText;
        } else {
            if ( i === 0 && form.elements[0].value.length < 3
                || form.elements[0].value.length > 20) {
                valide = false;
                document.getElementById("EnomAnimal").innerHTML = msgLength;
            }
            if ( i === 3 && parseInt(form.elements[3].value) < 0
                || parseInt(form.elements[3].value) > 30) {
                valide = false;
                document.getElementById("EageAnimal").innerHTML = msgNmb;
            }
            if ( i === 5 ) {
                valide = validerCourriel();
            }
            if ( i === 6 ) {
                valide = validerAdresse();
            }
        }
    }
    return valide;
}