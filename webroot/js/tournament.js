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

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
