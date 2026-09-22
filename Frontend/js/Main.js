const url = `http://localhost/3e/AWEB2/Hottelier_Theo_AWEB3_UE1_Revision_Horai/api/EpClasse.php`;
async function RecupererLesClasse() {
    try {
        const reponse = await fetch(url);

        if (!reponse.ok) throw new Error("Classe introuvable");

        const data = await reponse.json();
        AfficheClasse(data);

    } catch (err) {
        document.querySelector("#details").innerHTML = `<p>${err.message}</p>`;
    }
}

function AfficheClasse(data) {
    const container = document.querySelector("#classe");
    let html = ""
    data.forEach(element => {
        html += `<tr>
                    <th scope="row">${element.id}</th>
                    <td>${element.nom}</td>
                    <td><a href="./details.html??nom=${element.nom}" class="btn btn-sm btn-primary">Click</a></td>
                </tr>`
    });
    container.innerHTML = html
}

RecupererLesClasse();