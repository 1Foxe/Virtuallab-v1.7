var state1 = false;
var state2 = false;

function toggle1() {
    if (state1) {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("eye1").style.color = '#7a797e';
        state1 = false;
    } else {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("eye1").style.color = '#5887ef';
        state1 = true;
    }
}

function toggle2() {
    if (state2) {
        document.getElementById("password2").setAttribute("type", "password");
        document.getElementById("eye2").style.color = '#7a797e';
        state2 = false;
    } else {
        document.getElementById("password2").setAttribute("type", "text");
        document.getElementById("eye2").style.color = '#5887ef';
        state2 = true;
    }
}