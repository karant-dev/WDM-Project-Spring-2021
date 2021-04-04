function onboard() {
    var bio = document.getElementById("bio").value;
    if ((bio == "") || (bio === undefined) || ([...bio].length = 0)) {
        alert("Please tell us about yourself");
        return false;
    }
    return false;
}