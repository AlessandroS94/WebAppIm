function redirectToCategory(pageUrl) {
    if (pageUrl) {
        window.location.href = pageUrl;
    }
}

function toggleCardVisibility(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        document.getElementById(elementId).remove();
        sessionStorage.setItem(sessionStorage.length, elementId);
    }
}

function clearHidden(){
    sessionStorage.clear()
    window.location.reload();
}

document.addEventListener('DOMContentLoaded', function() {
    elements = sessionStorage
    for (let i = 0; i < elements.length; i++) {
        toggleCardVisibility(elements[i]);
    }
});
