const regTxt = new RegExp('\,');
const regEmail = new RegExp('([a-zA-z0-9\\-\é\à\è\ê\ç\î\ô\`\.]*@[a-zA-Z]*\\.(com|ca|org|edu|fr))');
const regAdrs = new RegExp('([0-9]{1,6}\040([A-Za-z\\-\é\à\è\ê\ç\î\ô\`]*\040*)+[HJG][0-9][A-Z][0-9][A-Z][0-9])');


const validerCourriel = () => {
    let valide = true;
    document.getElementById("EcourrielProp").innerHTML = "";
    let msgE = "\tL'adresse courriel n'est pas une adresse de format valide! (Ex : exemple@gmail.com)".fontcolor("RED")

    if (document.getElementById("courrielProp").value.search(regEmail) === -1) {
        console.log(document.getElementById("courrielProp").innerHTML.search(regEmail));
        document.getElementById("EcourrielProp").innerHTML = msgE;
        valide = false;
    }
    return valide;
}

const validerAdresse = () => {
    let valide = true;
    document.getElementById("EadresseAnimal").innerHTML = "";
    let msgE = "\tL'adresse postale n'est pas une adresse québécoise valide! L'adresse doit suivre ce format : adresse civique, ville, code postal.".fontcolor("RED");

    if (document.getElementById("adresseAnimal").value.search(regAdrs) === -1) {
        document.getElementById("EadresseAnimal").innerHTML = msgE;
        valide = false;
    }
    return valide;
}

const onSubmit = () => {
    let valide = true;
    const form = document.querySelector('form');
    let msgText = "\tCe champs ne peut pas être vide ou avoir des virgules!".fontcolor("RED");
    let msgNmb = "\tL'âge doit être une valeur numérique entre 0 et 30!".fontcolor("RED");
    let msgLength = "\tLe nom de l'animal doit avoir entre 3 et 20 caractères!".fontcolor("RED");
    for (let i = 0; i < 7; ++i) {
        document.getElementById("E" + form.elements[i].id).innerHTML = "";
        document.getElementById(form.elements[i].id).style.borderColor = "black"
        if (form.elements[i].value === "" || form.elements[i].value.search(regTxt) !== -1) {
            document.getElementById("E" + form.elements[i].id).innerHTML = msgText;
            document.getElementById(form.elements[i].id).style.borderColor = "RED"
            valide = false;
        }
    }
    if (form.elements[0].value.length < 3
        || form.elements[0].value.length > 20) {
        document.getElementById("EnomAnimal").innerHTML = msgLength;
        valide = false;
    }
    if (parseInt(form.elements[3].value) < 0 || parseInt(form.elements[3].value) > 30
        || isNaN(parseInt(form.elements[3].value))) {
        document.getElementById("EageAnimal").innerHTML = msgNmb;
        valide = false;
    }
    return valide && validerCourriel() && validerAdresse();
}

