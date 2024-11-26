function redirectToCategory(pageUrl) {
    if (pageUrl) {
        window.location.href = pageUrl;
    }
}


/*****************************
 *  Function card
******************************/

function toggleCardVisibility(elementId) {
    if (localStorage.key(elementId)){
        localStorage.removeItem(elementId);

        if (elementId.includes('_T')){
            localStorage.removeItem(elementId.replace('_T',''));
        }
        else {
            localStorage.removeItem(elementId + '_T');
        }
        window.location.reload();
        return ;
    }
    const element = document.getElementById(elementId);
    let card_element;
    let table_element;
    if (element) {
        card_element = document.getElementById(elementId).innerHTML;
        table_element = document.getElementById(elementId + '_T').innerHTML;
        localStorage.setItem(elementId, card_element);
        localStorage.setItem(elementId + '_T', table_element);
    }
    document.getElementById(elementId).remove();
    document.getElementById(elementId + '_T').remove();
}

function clearHidden(){
    for (let index = 0; index < localStorage.length; index++) {
        const key = localStorage.key(index);
        if (key.includes('_T')) {
            let n = document.createElement('tr');
            n.classList.add('table-warning');
            n.id = key;
            n.innerHTML = localStorage.getItem(key);
            document.getElementById('elements_t').append(n);
        }
        else {
            let n = document.createElement('div');
            n.classList.toggle('col');
            n.id = key;
            n.innerHTML = localStorage.getItem(key);
            n.childNodes[1].classList.toggle('border-warning');
            document.getElementById('elements').append(n);

        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    for (let index = 0; index < localStorage.length; index++) {
        const key = localStorage.key(index);
        document.getElementById(key).remove();
    }

});
