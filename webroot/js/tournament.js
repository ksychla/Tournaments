const info_lol = document.getElementById("tournament_info");
const t_desc = document.getElementById("t_desc");
const location_lolls = document.getElementById("location");
var is_shown = true;
showOnClick();

function showOnClick() {
    if(is_shown){
        info_lol.classList.add("hidden_info");
        t_desc.style.display = "none";
        location_lolls.style.display = "none";
    }else{
        info_lol.classList.remove("hidden_info");
        t_desc.style.display = "flex";
        location_lolls.style.display = "flex";
    }
    is_shown = !is_shown;
}
