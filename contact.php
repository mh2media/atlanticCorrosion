<?php 
$pageTitle="Contact Atlantic Corrosion Engineers"; 

function customPageHeader(){?>
  <!--Any additional HTML tags for each page -->
<?php }

include_once('header.php');
?>

<div class="col-md-8 col-xl-9 col-lg-8 col-sm-12 col-xs-12" style="background-color: #ffffff; text-align: left;">

                    
    <div class="boxyPadding">
	<h2> Contact</h2>
	<h1 style="margin-top:-.25em;">Atlantic Consultants</h1>
 <p>Please complete the form below.</p>


 <div class="formContainer">
	
	<form action="mailHandler.php" name="contact_form" id="myForm" method="POST">
		<label for="first_name">First Name:</label>
		<input name="first_name" type="text" required placeholder="John"/>
		<br>
		<label for="last_name">Last Name:</label>
		<input name="last_name" type="text" required placeholder="Doe"/>
		<br>
		<label for="email_from">Email:</label>
		<input name="email_from" type="email" required placeholder="you@domain.com"/>
		<br>
        <label for="telephone">Phone:</label>
		<input name="telephone" type="tel" required placeholder="123-456-7890"/>
		<br>
		<label for="message">Message:</label><br>
		<textarea name="message" cols="30" rows="10" placeholder="Enter your message here ..." required> </textarea>
		<div class="center">
			<input type="submit" value="Submit">
		</div>
    </form>	
<br />
<br />
    <br />
</div>

<br />
</div>
            </div>


        <?php include 'footer.php'; ?>