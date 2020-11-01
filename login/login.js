function login() {
    var username = document.getElementById("user").value;
    var pwd = document.getElementById("pwd").value;

    if (!validUser(username)) {
        document.getElementById("errorMsg").innerHTML = "One or more fields are inccorect";
        document.getElementById("user") = "";
    } else {
        var data = new FormData();
        data.append('user', document.getElementById("user").value);
        data.append('pwd', document.getElementById("pwd").value);

        // AJAX CALL
        var xhr = new XMLHttpRequest();
        xhr.open('POST', "1b-ajax.php");
        xhr.onload = function () {
            // console.log(this.response);
            if (this.response == "OK") {
                document.createElement("div");
                document.getElementsByTagName("div").innerHTML += this.response;
            } else {
                alert(this.response);
            }
        };
        xhr.send(data);
        return false;
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