function sendEmail(email, subject, body) {
    Email.send({
        SecureToken: "8c8ae59f-170d-4433-a119-f71f026e1d89",
        To: email,
        From: "wdmprojectspring2021@gmail.com",
        Subject: subject,
        Body: body
    }).then(alert("Please check your email"));
}