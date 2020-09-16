window.onload = () => {

  const form = document.querySelector('loginForm');
  form.addEventListener('submit', event => {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("server").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("POST", "login.php?q=" + str, true);
    xmlhttp.send();
  })
}