<!DOCTYPE html>
<html>
<head>
  <title>Participant Registration</title>

  <style>
   

    h2 {
      text-align: center;
      color: #003366;
    }

form {
      background-color: #eae9daff;
      padding: 20px;
      width: 300px;
      margin: 0 auto;
    }

     input {
      width: 90%;
      padding: 10px;
      margin-top: 10px;
    }

    button {
        width: 100%;
      background-color: #003366;
      color: white;
      cursor: pointer;
      padding: 10px;
      margin-top: 10px;
    }

#output {
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      color: #003366;
    } </style>
   </head>
             <body>

<center>  <h2>Participant Registration</h2> </center>

  <form onsubmit="return registerParticipant()">

    <label>Full Name:</label>
    <input type="text" id="fullname">

    <label>Email:</label>
    <input type="email" id="email">

    <label>Phone Number:</label>
    <input type="text" id="phone">

    <label>Password:</label>
    <input type="password" id="password">

    <label>Confirm Password:</label>
    <input type="password" id="confirmPassword">

    <button type="submit">Register</button>
  </form>

  <div id="output"></div>

  <script>
    function registerParticipant() {
      let fullname = document.getElementById("fullname").value.trim();
      let email = document.getElementById("email").value.trim();
      let phone = document.getElementById("phone").value.trim();
      let password = document.getElementById("password").value;
      let confirmPassword = document.getElementById("confirmPassword").value;

      let outputDiv = document.getElementById("output");

      outputDiv.innerHTML = "";

      // Validation
      if (fullname === "" || email === "" || phone === "" || password === "" || confirmPassword === "") {
        alert("Please fill alll the fields");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Password mismatch!");
        return false;
      }

      // Show registration result
      outputDiv.innerHTML = `
        <b>Registration Complete!</b><br><br>
        Name: ${fullname}<br>
        Email: ${email}<br>
        Phone: ${phone}
      `;

      return false;
    }
  </script>

</body>
</html>
