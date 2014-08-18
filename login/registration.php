<?php

include "../config.php";


$username = $_POST['username'];

$number = mysqli_query($con, 'SELECT id FROM users WHERE username = "'.$username.'"');


if(mysqli_num_rows($number) > 0) {
	echo "<span style='color: red;'>That username is already taken.</span>";
} else {

	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$role = mysqli_real_escape_string($con, $_POST['role']);
	$status = mysqli_real_escape_string($con, $_POST['status']);
	$manager = mysqli_real_escape_string($con, $_POST['manager']);
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: ". $email ."\r\n";
    $headers .= "CC: jcarlson@boostability.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $subject = ("Boost Connect Account");
    $message = ("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
      <meta name='viewport' content='width=device-width, initial-scale=1' />
      <title>Neopolitan Welcome Email</title>
     
      <style type='text/css'>
      @import url(http://fonts.googleapis.com/css?family=Droid+Sans);

      /* Take care of image borders and formatting */

      img {
        max-width: 600px;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
      }

      a {
        text-decoration: none;
        border: 0;
        outline: none;
        color: #bbbbbb;
      }

      a img {
        border: none;
      }

      /* General styling */

      td, h1, h2, h3  {
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 400;
      }

      td {
        text-align: center;
      }

      body {
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:none;
        width: 100%;
        height: 100%;
        color: #37302d;
        background: #ffffff;
        font-size: 16px;
      }

       table {
        border-collapse: collapse !important;
      }

      .headline {
        color: #ffffff;
        font-size: 36px;
      }

     .force-full-width {
      width: 100% !important;
     }

      </style>

      <style type='text/css' media='screen'>
          @media screen {
             /*Thanks Outlook 2013! http://goo.gl/XLxpyl*/
            td, h1, h2, h3 {
              font-family: 'Droid Sans', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
            }
          }
      </style>

      <style type='text/css' media='only screen and (max-width: 480px)'>
        /* Mobile styles */
        @media only screen and (max-width: 480px) {

          table[class='w320'] {
            width: 320px !important;
          }


        }
      </style>
    </head>
    <body class='body' style='padding:0 !important; margin:0 !important; display:block !important; background:#ffffff; -webkit-text-size-adjust:none' bgcolor='#ffffff'>
    <table align='center' cellpadding='0' cellspacing='0' width='100%' height='100%' >
      <tr>
        <td align='center' valign='top' bgcolor='#ffffff'  width='100%'>
          <center>
            <table style='margin: 0 auto;' cellpadding='0' cellspacing='0' width='600' class='w320'>
              <tr>
                <td align='center' valign='top'>

                    <table style='margin: 0 auto;' cellpadding='0' cellspacing='0' width='100%' style='margin:0 auto;'>
                      <tr>
                        <td style='font-size: 30px; text-align:center;'>
                          <br>
                            Boost Connect
                          <br>
                          <br>
                        </td>
                      </tr>
                    </table>

                    <table style='margin: 0 auto;' cellpadding='0' cellspacing='0' width='100%' bgcolor='#4dbfbf'>
                      <tr>
                        <td>
                        <br>
                          <img src='https://www.filepicker.io/api/file/Pv8CShvQHeBXdhYu9aQE' width='216' height='189' alt='robot picture'>
                        </td>
                      </tr>
                      <tr>
                        <td class='headline'>
                          Welcome!
                        </td>
                      </tr>
                      <tr>
                        <td>

                          <center>
                            <table style='margin: 0 auto;' cellpadding='0' cellspacing='0' width='60%'>
                              <tr>
                                <td style='color:#187272;'>
                                <br>
                                 You're account has been created with the information below. Contact your manager to have your account activated!
                                <br>
                                <br>
                                </td>
                              </tr>
                            </table>
                          </center>

                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div><!--[if mso]>
                            <v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='http://' style='height:50px;v-text-anchor:middle;width:200px;' arcsize='8%' stroke='f' fillcolor='#178f8f'>
                              <w:anchorlock/>
                              <center>
                            <![endif]-->
                                <a href='http://'
                          style='background-color:#178f8f;border-radius:4px;color:#ffffff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:16px;font-weight:bold;line-height:50px;text-align:center;text-decoration:none;width:300px;-webkit-text-size-adjust:none;'>Username: ".$username."<br> Password:  ".$password."</a>
                            <!--[if mso]>
                              </center>
                            </v:roundrect>
                          <![endif]--></div>
                          <br>
                          <br>
                        </td>
                      </tr>
                    </table>


                    <table style='margin: 0 auto;' cellpadding='0' cellspacing='0' class='force-full-width' bgcolor='#414141' style='margin: 0 auto'>
                      <tr>
                        <td style='background-color:#414141;'>
                        <br>

                          <br>
                        </td>
                      </tr>
                      <tr>
                        <td style='color:#bbbbbb; font-size:12px;'>
                          <a href='#'>View in browser</a> | <a href='#'>Unsubscribe</a> | <a href='#'>Contact</a>
                          <br><br>
                        </td>
                      </tr>
                      <tr>
                        <td style='color:#bbbbbb; font-size:12px;'>
                           © 2014 All Rights Reserved
                           <br>
                           <br>
                        </td>
                      </tr>
                    </table>





                </td>
              </tr>
            </table>
        </center>
        </td>
      </tr>
    </table>
    </body>
    </html>");
    

	if (mysqli_query($con, "INSERT INTO users (firstname, lastname, email, username, password, role, status, manager) 
		VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$role', '$status', '$manager')")){
		echo "<span style='color: green;'>Your account has been created! Before you can login, you need to contact a manager to approve your account.</span>";

        mail($email, $subject, $message, $headers);
        
	} else {

		echo "<span style='color: red;'>Sorry, something has gone wrong, please try again!</span>";
	}
	
}


?>

