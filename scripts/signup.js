function validation() {
    var mail = document.getElementById("email").value;

    // Validate email ID formatting
    var atpos = mail.indexOf("@");
    var dotpos = mail.lastIndexOf(".");
    if (atpos < 1 || (dotpos - atpos < 3) || dotpos + 2 >= mail.length) {
        alert("Please enter valid Email");
        document.getElementById("email").focus();
        return false;
    }
}