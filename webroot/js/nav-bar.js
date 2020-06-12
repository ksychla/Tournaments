let glass = document.getElementById("search-glass");
let text = document.getElementById("search-text");
let search = document.getElementById("search");
let register = document.getElementById("register");

function glassOnClick() {
    glass.style.display = 'none';
    text.style.display = 'block';
    if(window.innerWidth <= 600 && register != null) {
        register.style.display = 'none';
    }
    search.focus();
}

function searchOnUnFocus() {
    if(window.innerWidth <= 600){
        glass.style.display = 'block';
        text.style.display = 'none';
    }
    if(register != null)
        register.style.display = 'inline-block';
}

function searchTournament(e) {
    if(e.keyCode === 13){
        window.location.replace("/turnieje?search="+search.value);
    }
}
