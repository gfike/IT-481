function login() {
    var username = document.getElementById("user").value;
    var pwd = document.getElementById("pwd").value;

    if (!validUser(username)) {
        document.getElementById("errorMsg").innerHTML = "One or more fields are inccorect";
        document.getElementById("user") = "";
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
        // xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}

function validUser(username) {
    var fs = require("fs");
    var text = fs.readFileSync("./valid-usernames.txt");
    var textByLine = text.split("\n");
    textByLine.forEach((element) => {
        if (username === element) {
            return true;
        }
    })
    return false;
}