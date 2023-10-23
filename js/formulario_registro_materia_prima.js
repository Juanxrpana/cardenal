function nextTab(tabId) {
    $('#myTabs a[href="#' + tabId + '"]').tab('show');
    updateProgressBar(tabId);
}

function prevTab(tabId) {
    $('#myTabs a[href="#' + tabId + '"]').tab('show');
    updateProgressBar(tabId);
}

function updateProgressBar(tabId) {
    if (tabId === 'proveedor-tab') {
        $('#progressBar').css('width', '0%');
    } else if (tabId === 'cantidad-tab') {
        $('#progressBar').css('width', '50%');
    } else if (tabId === 'calidad-tab') {
        $('#progressBar').css('width', '100%');
    }
}

const pills = document.querySelectorAll(".progress-pill");
let currentIndex = 0;

pills.forEach((pill, index) => {
    pill.addEventListener("click", () => {
        if (index <= currentIndex) {
            pill.classList.add("complete");
            currentIndex = index;
        }
    });
});