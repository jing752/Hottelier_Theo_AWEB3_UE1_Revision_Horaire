const params = new URLSearchParams(window.location.search);

RecupererLesClasse();

async function RecupererLesClasse() {
    const classe = params.get("nom");
    
    const titleElement = document.querySelector("h1");
    titleElement.innerHTML ="Horaire de la " + classe;
    
    
    const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpCreneau.php?name=${classe}`;

    try {
        const reponse = await fetch(url);

        if (!reponse.ok) throw new Error("Classe introuvable ou erreur de chargement");

        const data = await reponse.json();
        AfficheClasse(data);

    } catch (err) {
        const tableContainer = document.querySelector("#table");
            tableContainer.innerHTML = `<h1 class="text-danger text-center my-5">${err.message}</h1>`;
    }
}

function AfficheClasse(data) {
    const container = document.querySelector("#horaire");
    
    let html = "";

    data.forEach(element => {
        html += `<tr>
                    <th scope="row">${element.id}</th>
                    <td>${element.cours}</td>
                    <td>${element.jour}</td>
                    <td>${element.heure_debut}</td>
                    <td>${element.heure_fin}</td>
                    <td>${element.salle}</td>
                    <td><a href="./modifier.html?id=${element.id}" class="btn btn-sm btn-primary">Modifier</a></td>
                    <td><button class="btn btn-sm btn-danger btn-supprimer" data-id="${element.id}">Supprimer</button></td>
                </tr>`;
    });
    
    container.innerHTML = html;

    document.querySelectorAll(".btn-supprimer").forEach(button => {
        button.addEventListener("click", (e) => {
            const idCreneau = e.target.getAttribute("data-id");
            SupprimerCreneau(idCreneau);
        });
    });
}

async function SupprimerCreneau(id) {
    const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpCreneau.php?id=${id}`;

    const options = {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    };

    try {
        const response = await fetch(url, options);

        if (!response.ok) throw new Error("Erreur lors de la suppression");

        RecupererLesClasse();

    } catch (error) {

    }
}