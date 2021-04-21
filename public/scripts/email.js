function sendEmail(email, subject, body) {
    Email.send({
        SecureToken: "b0cac9fe-6d46-400e-9e43-1b9634ae9fc9",
        To: email,
        From: "wdmprojectspring2021@gmail.com",
        Subject: subject,
        Body: body
    }).then(alert("Please check your email"));
}