function validate() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if ((username == "") || (username === undefined) || ([...username].length = 0)) {
        alert("Please enter a valid username");
        return false;
    }
    var password = form.elements["password-field"].value;
    if ((password == "") || (password === undefined) || ([...password].length = 0)) {
        alert("Please enter a valid password");
        return false;
    }
}