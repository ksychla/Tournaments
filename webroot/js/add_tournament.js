let sponsors_list = document.getElementById("sponsors_list");
let sponsors_list_js = [];
let sponsors_hidden = document.getElementById("sponsors_hidden");
let select_sponsor = document.getElementById("select_sponsor");

function add_sponsor() {
    let div = document.createElement('p');  // TODO change to nice looking div
    div.textContent = "lole";
    let input_hid = document.createElement('input');
    input_hid.type = 'hidden';
    input_hid.value = select_sponsor.value;
    input_hid.name = "sponsors"+sponsors_list_js.length;
    sponsors_list.appendChild(div);
    sponsors_list.appendChild(input_hid);
    sponsors_list_js.push("lole");
    sponsors_hidden.value = sponsors_hidden;
}
