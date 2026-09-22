const params = new URLSearchParams(window.location.search);
async function RecupereCours() {
    const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpCours.php`
    try {
        const reponse = await fetch(url);

        if (!reponse.ok) throw new Error("Classe introuvable");

        const data = await reponse.json();
        AfficheCours(data);

    } catch (err) {

        document.querySelector("#cours").innerHTML = `<h1 class="text-danger">${err.message}</h1>`;
    }
}

function AfficheCours(data) {
    const container = document.querySelector("#cours");
    let html = "";

    data.forEach(element => {
        html += `<option value="${element.code}">${element.code}</option>`;
    });

    container.innerHTML += html;
}

async function RecupererLesClasse() {
    const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpClasse.php`;
    try {
        const reponse = await fetch(url);

        if (!reponse.ok) throw new Error("Classe introuvable");

        const data = await reponse.json();
        AfficheClasse(data);

    } catch (err) {
        document.querySelector("#classe").innerHTML = `<p>${err.message}</p>`;
    }
}

function AfficheClasse(data) {
    const container = document.querySelector("#classe");
    let html = ""
    data.forEach(element => {
        html += `<option value="${element.nom}" >${element.nom}</option>`
    });
    container.innerHTML += html
}

RecupererLesClasse();

RecupereCours();

document.querySelector("form").addEventListener("submit", (element) => {
    element.preventDefault();
    const formdata = new FormData(element.target);

    let classe = formdata.get("classe")
    let cours = formdata.get("cours")
    let jour = formdata.get("jour")
    let heure_debut = formdata.get("heure_debut")
    let heure_fin = formdata.get("heure_fin")
    let salle = formdata.get("salle")
    const id = params.get("id");
    ModifierCreneau(id,classe,cours,jour,heure_debut,heure_fin,salle)

})

async function ModifierCreneau(id,classe, cours, jour, heure_debut, heure_fin, salle) {
    const url = 'http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpCreneau.php?id='+id;
    
    const options = {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            classe: classe,
            cours: cours,
            jour: jour,
            heure_debut: heure_debut,
            heure_fin: heure_fin,
            salle: salle
        })
    };

    try {
        const response = await fetch(url, options);
        
        if (!response.ok) throw new Error("Erreur lors de l'ajout du créneau");

        const data = await response.json();
        console.log("Succès :", data);
        document.querySelector("#alert").classList.remove("d-none");
        document.querySelector("#alert").innerHTML = "Modification Reussi"
    } catch (error) {
        console.error("Erreur :", error);
        document.querySelector("#alert").classList.remove("alert-success");
        document.querySelector("#alert").innerHTML = "Modification louper"
        document.querySelector("#alert").classList.add("alert-danger");
    }
}