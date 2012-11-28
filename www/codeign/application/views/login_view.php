
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
  <img id = "logo"src="<?php echo base_url(); ?>/powerhouse.png" alt="Power House!">
   <title>IPRO 343</title>
 </head>
 <body>
  <div id="login-div">
   <h1 >User Login</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
   </div>
 </body>
</html>
