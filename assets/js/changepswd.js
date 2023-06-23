var state1 = false;
var state2 = false;
var state3 = false;

function toggle1() {
    if (state1) {
        document.getElementById("pass_lama").setAttribute("type", "password");
        document.getElementById("eye1").style.color = '#7a797e';
        state1 = false;
    } else {
        document.getElementById("pass_lama").setAttribute("type", "text");
        document.getElementById("eye1").style.color = '#5887ef';
        state1 = true;
    }
}

function toggle2() {
    if (state2) {
        document.getElementById("pass_baru").setAttribute("type", "password");
        document.getElementById("eye2").style.color = '#7a797e';
        state2 = false;
    } else {
        document.getElementById("pass_baru").setAttribute("type", "text");
        document.getElementById("eye2").style.color = '#5887ef';
        state2 = true;
    }
}

function toggle3() {
    if (state3) {
        document.getElementById("konfirmasi_pass").setAttribute("type", "password");
        document.getElementById("eye3").style.color = '#7a797e';
        state3 = false;
    } else {
        document.getElementById("konfirmasi_pass").setAttribute("type", "text");
        document.getElementById("eye3").style.color = '#5887ef';
        state3 = true;
    }
}