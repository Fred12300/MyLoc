const deleteBtn = document.getElementById('deleteBtn');

const checkIf = (eleId, eleNom) => {
    let url = window.location.pathname;
    let cible = url.slice(7)
    if (window.confirm(`Voulez-vous supprimer l'élément: ${eleNom} ?`)){
        window.location.href=`${cible}?action=delete&target=${eleId}`
    }
}