<!DOCTYPE html>
<html>
     <head>
        <title>index</title>
</head>
<style>

    body{
        background-color:MintCream;
    }


#div1{
    text-align:left;
    margin-top:20px;
    background-color:Beige;
    width:500px;
    height: 600px;
    font-weight: bold;
}
#div2{padding:10px;}
   
   .box{
    length=80px;
    width:480px;
   }
select{
    margin-bottom:5px;
    width:480px;
    margin-left:10px;
}
button{
    color:white;
    background-color:MidnightBlue;
    padding:5px;
    width:460px;
}
#h2_1{
    color:MidnightBlue;
}
#h2_2{
    color:MidnightBlue;
}

</style>
<body>
<center>
    <h2 id ="h2_1"> Clinic Patient Registration</h2>
</center>

<center>
<div id="div1">
    <div id="div2">
  Full Name: <br>
 <center> <input type ="text"class="box"></center> <br>

   Age: <br>
  <center><input type ="text"class="box"> </center><br>

   Phone Number: <br>
 <center> <input type ="text"class="box"> </center><br>

   Email Address: <br>
 <center> <input type ="text"class="box"></center> <br> 

  Insurance Provider:<br>
  <select>
    <option>Select provider</option>
  </select><br>
  
  Insurance Policy Number: <br>
 <center> <input type ="text"class="box"> </center>
  <h2 id="h2_2"> 
     <center> Additional Information</center>
  </h2>

   Username: <br>
  <center><input type ="text"class="box"> </center><br> 

   Password: <br>
  <center><input type ="text"class="box"> </center><br> 

   Confirm Password: <br>
 <center> <input type ="text" class="box"></center> <br> 

  <center><button>Register</button></center>
</div>
</div>
</center>

</body>


    </html>

