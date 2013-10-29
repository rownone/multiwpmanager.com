<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="css/main.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />

	<title>Install Multiwpmanager</title>
</head>
<?php
    //$query = $_SERVER['PHP_SELF'];
    //$path = pathinfo( $query );
    //$what_you_want = $path['basename'];
    //$filename = basename($_SERVER['REQUEST_URI']);

?>
<body>

<div class="container" id="page">
        			<!-- breadcrumbs -->
	
	<div id="content">
	
<h1>Configuration</h1>
<hr>
<div class="form">

<form id="install-form" action="" method="post">
	<p class="note">Please enter your database connection details. If you're not sure about these, contact your host.</p>

    <div class="row">
		<label class="required" for="Install_db_host">Database Host: <span class="required">*</span></label>		
        <input type="text" id="Install_db_host" name="CreateDB[db_host]" value="localhost"/>
	</div>
  
	<div class="row">
		<label class="required" for="Install_db_username">User <span class="required">*</span></label>		
        <input type="text" id="Install_db_username" name="CreateDB[db_username]"/>
	</div>
    
    <div class="row">
		<label class="required" for="Install_db_password">Password</label>		
        <input type="text" id="Install_db_password" name="CreateDB[db_password]"/>
	</div>
    
    <div class="row">
		<label class="required" for="Install_db_name">Database Name <span class="required">*</span></label>		
        <input type="text" id="Install_db_name" name="CreateDB[db_name]"/>
	</div>
    
    <div class="row">
		<label class="required" for="Install_db_prefix">Database Prefix <span class="required">*</span></label>		
        <input type="text" id="Install_db_prefix" name="CreateDB[db_prefix]" value="tbl"/>
	</div>
    
    <hr>
    <p class="note">Please enter a username and password for the administration.</p>
    
    <div class="row">
		<label class="required" for="create_admin_user">Username <span class="required">*</span></label>		
        <input type="text" id="create_admin_user" name="CreateAdmin[username]" value="Admin">
	</div>
    
    <div class="row">
		<label class="required" for="create_admin_password">Password <span class="required">*</span></label>		
        <input type="text" id="create_admin_password" name="CreateAdmin[password]">
	</div>
    
    <div class="row">
		<label class="required" for="create_admin_email">Email<span class="required">*</span></label>		
        <input type="text" id="create_admin_email" name="CreateAdmin[email]">
	</div>
    
    <div class="row">
		<label class="required" for="create_admin_site_title">Site Title<span class="required">*</span></label>		
        <input type="text" id="create_admin_site_title" name="CreateAdmin[sitetitle]">
	</div>
    
	<div class="row buttons">
		<input type="submit" name="yt0" value="Install" />	</div>

</form>
</div><!-- form -->
</div><!-- content -->

	<div class="clear"></div>

	<div id="footer">
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
