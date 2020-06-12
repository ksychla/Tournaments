let glass = document.getElementById("search-glass");
let text = document.getElementById("search-text");
let search = document.getElementById("search");

function glassOnClick() {
    glass.style.display = 'none';
    text.style.display = 'block';
    search.focus();
}

function searchOnUnFocus() {
    if(window.innerWidth <= 600){
        glass.style.display = 'block';
        text.style.display = 'none';
    }
}

function searchTournament(e) {
    if(e.keyCode === 13){
        window.location.replace("/turnieje?search="+search.value);
    }
}
