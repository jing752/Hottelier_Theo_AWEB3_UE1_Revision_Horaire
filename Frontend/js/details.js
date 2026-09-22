const params = new URLSearchParams(window.location.search);

RecupererLesClasse();

async function RecupererLesClasse() {
    const classe = params.get("nom");
    document.querySelector("h1").innerHTML += classe;
    const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpCreneau.php?name=${classe}`;
    
    try {
        const reponse = await fetch(url);

        if (!reponse.ok) throw new Error("Classe introuvable");

        const data = await reponse.json();
        AfficheClasse(data);

    } catch (err) {
        document.querySelector("#horaire").innerHTML = `<p>${err.message}</p>`;
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
                    <td><a href="#" class="btn btn-sm btn-primary">Modifier</a></td>
                    <td><a href="#" class="btn btn-sm btn-danger">Supprimer</a></td>
                </tr>`;
    });
    
    container.innerHTML = html;
}