let sponsors_list = document.getElementById("sponsors_list");
let sponsors_list_js = {};
let select_sponsor = document.getElementById("select_sponsor");
let current_id = 0;

function add_sponsor() {
    let semi_colon = select_sponsor.value.indexOf(';');
    let val_name = select_sponsor.value.substring(semi_colon+1);
    let val_code = select_sponsor.value.substring(0, semi_colon);
    if(!(val_code in sponsors_list_js)){
        let div = document.createElement('button');
        div.classList.add('del_button');
        div.textContent = val_name;
        let input_hid = document.createElement('input');
        input_hid.type = 'hidden';
        input_hid.value = val_code;
        input_hid.name = "sponsors"+current_id;
        current_id++;
        div.onclick = function(){ delSponsor(val_code, div, input_hid); }
        sponsors_list.appendChild(div);
        sponsors_list.appendChild(input_hid);
        sponsors_list_js[val_code] = val_name;
    }
}

function delSponsor(val_code, div, input_hid) {
    delete sponsors_list_js[val_code];
    sponsors_list.removeChild(div);
    sponsors_list.removeChild(input_hid);
}
