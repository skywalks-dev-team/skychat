<?php 
  require 'config/common.php';
  require 'config/head.php';
  // require 'config/conn.php';
  require 'config/vars.php';
?>
<body>
	<div class="wrapper-page">
		<header>
		    <nav class="navbar navbar-inverse"  id="MyNavbar">
		      <div class="container-fluid">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span> 
		          </button>
		          <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
		        </div>
		        <div class="collapse navbar-collapse" id="myNavbar">
		          <ul class="nav navbar-nav">
		            <li class="active"><a href="#">Home</a></li>
		            <!-- <li><a href="javascript:void(0)">About</a></li>
		            <li><a href="javascript:void(0)">Contact</a></li> 
		            <li><a href="javascript:void(0)">Support</a></li>  -->
		          </ul>
		        </div>
		      </div>
		    </nav>
		 </header>
		 <div id="div1"></div>
		<div class="container-fluid">
	    <div class="container"><?php print $messages; ?></div>
	  </div>
		<div class="container">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="col-md-6">	
				<label>Mail :</label>
				<input type="email" name="mail_id" id="mail_id" class="form-control" placeholder="email">
				<label>Password :</label>
				<div>
					<div id="match"></div>
			    <div class="input-group">
			      <input type="password" onkeyup="password_check()" id="password" class="form-control" placeholder="password">
			      <span class="input-group-btn">
			        <button class="btn btn-default" id="show" onclick="show_password()" type="button">
			        	<span class="glyphicon glyphicon-eye-open"></span>
			        </button>
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
				<label>Confirm Password :</label>
				<input type="password" name="confirm_pass" id="confirm_pass" class="form-control" onkeyup="password_check()" placeholder="confirm password">
			</div>
			<div class="col-md-6">
				<label>Display Name:</label>
				<input type="text" name="display_name" id="display_name" class="form-control" placeholder="display name">
				<label>First Name :</label>
				<input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control">
				<label>Last Name :</label>
				<input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
			</div>
			<br>
			<div class="col-md-12">
				<br>
				<input type="submit" id="create_admin" disabled="true" name="create_admin" value="continue" class="btn">
			</div>
		</form>
		</div>
	</div>
	<?php require 'config/footer.php'; ?>
</body>
<script type="text/javascript">
$('#create_admin').click(function(event) {
  $('.form-control').attr('disabled','true');
   event.preventDefault();
    var mail = $('#mail_id').val();
    var pass = $('#confirm_pass').val();
    var d_name = $('#display_name').val();
    var f_name  = $('#first_name').val();
    var l_name = $('#last_name').val();
    $.ajax({
      type: "POST",
      url: "config/admin_data.php",
      data: {mail:mail,pass:pass,d_name:d_name,f_name:f_name,l_name:l_name},
      success: function(result){
        $("#div1").html(result);
      }
    });
  // alert('here');
});
</script>
</html>
