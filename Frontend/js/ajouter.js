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