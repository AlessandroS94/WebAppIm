function redirectToCategory(pageUrl) {
    if (pageUrl) {
        window.location.href = pageUrl;
    }
}

function toggleCardVisibility(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        document.getElementById(elementId).remove();
        localStorage.setItem(localStorage.length, elementId);
    }
}

function clearHidden(){
    localStorage.clear()
    window.location.reload();
}

document.addEventListener('DOMContentLoaded', function() {
    for (let i = 0; i < localStorage.length; i++) {
        toggleCardVisibility(localStorage[i]);
    }
});
