<!DOCTYPE html>
<html>
<head>
  <title>Labask2</title>

  <style>
   
   #courseForm {
  margin-top: 100px;
  
}

    h1 {
      text-align: center;
    }

form {
      background-color:white;
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
      background-color:blue;
      color: white;
      cursor: pointer;
      padding: 10px;
      margin-top: 10px;
    }

#output {
      margin-top: 20px;
      text-align: center;
      font-size: 16px;
      color: blue;
    } </style>
   </head>
<body style="background-color:lightblue">

<center>  <h1>Student Registration</h1> </center>

  <form onsubmit="return submithandle()">

    <label>Full Name:</label>
    <input type="text" id="name">

    <label>Email:</label>
    <input type="email" id="email">

    <label>Password:</label>
    <input type="password" id="password">

    <label>Confirm Password:</label>
    <input type="password" id="confirmPassword">

    <button type="submit">Register</button>
  </form>

  <div id="output"></div>

  <script>
    function submithandle() {
      var name = document.getElementById("name").value.trim();
      var email = document.getElementById("email").value.trim();
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirmPassword").value;

      var outputDiv = document.getElementById("output");

      outputDiv.innerHTML = "";

      if (name === "" || email === "" || password === "" || confirmPassword === "") {
        alert("Please fill all the fields");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Password didnt match!");
        return false;
      }

      outputDiv.innerHTML = `
        <b>Registration Successful!</b><br><br>
        Name: ${name}<br>
        Email: ${email}<br>
      `;

      return false;
    }
  </script>




 <form id="courseForm">
    <center><h1>Course Registration</h1></center>
<label>Course Name:</label>
 <input type="text" id="courseName" name="courseName">
<button type="submit">Add Course</button>
  <input type="text" value="webtech">
  <button>Delete</button>
  </form>
 
 
</body>
</html>
