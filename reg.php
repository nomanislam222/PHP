<!DOCTYPE html>
<html>
<head>
<title>Registration Details</title>
</head>
<body>
<h1>Registration Details</h1>
<table>
  <tr>
    <td>
      <fieldset>
        <legend>General Information:</legend>
        <table>
         <tr>
           <td align="center"><b>First Name</b></td>
           <td> : <?php echo $_POST['fname']; ?></td>
           <td rowspan="7"><input type="file" name="fileUpload"></td>
         </tr>

     <tr>
      <td align="center"><b>Last name</b></td>
      <td> :  <?php echo $_POST['lname']; ?></td>
     </tr>

     <tr>
      <td align="center"><b>Gender</b></td>
      <td> : <?php echo $_POST['gender']; ?>
     </tr>

     <tr>
      <td align="center"><b>Father's Name</b></td>
      <td> : <?php echo $_POST['fa_name']; ?></td>
     </tr>

     <tr>
      <td align="center"><b>Mother's Name</b></td>
      <td> : <?php echo $_POST['mo_name']; ?></td>
     </tr>

     <tr>
      <td align="center"><b>Blood Group</b></td>
      <td> : <?php echo $_POST['blood']; ?></td>
     </tr>

     <tr>
      <td align="center"><b>Religion</b></td>
      <td> : <?php echo $_POST['religion']; ?></td>
     </tr>
        </table>
      </fieldset>
    </td>


    <td>
      <fieldset>
        <legend>Contact Information:</legend>
        <table>
          <tr>
            <td align="center"><b>Email</b></td>
            <td> : <?php echo $_POST['email']; ?></td>
          </tr>
          <tr>
            <td align="center"><b>Phone/Mobile</b></td>
            <td> : <?php echo $_POST['phone']; ?></td>
          </tr>
          <tr>
            <td align="center"><b>Website</b></td>
            <td> :  <?php echo $_POST['wb_address']; ?></td>
          </tr>
          <tr>
            <td align="center"><b>Address</b></td>
            <td><fieldset>
        <legend>Present Address:</legend>
        <table>
          <tr> <?php echo $_POST['street'].', '.$_POST['area'].', '.$_POST['city'].', '.$_POST['country'];?>
          </tr></table></legend></td>
          </tr>

        </table>
      </fieldset>
    </td>

   
    <td>
      <fieldset>
        <legend>Account Information:</legend>
        <table>
          <tr>
            <td align="center"><b>User Name</b></td>
            <td>:  <?php echo $_POST['user']; ?></td>
          </tr>
           <tr>
            <td align="center"><b>Password</b></td>
            <td>:  <?php echo $_POST['password']; ?></td>
          </tr>
         <tr>
            <td align="center"><b>Confirm Password</b></td>
            <td>:  <?php echo $_POST['password']; ?></td>
          </tr>
        </table>
      </fieldset>
<br>
    </td> 
  </tr>
</table>
</body>
</html>
