<?php require 'config/head.php'; require 'config/common.php'; require 'config/vars.php';?>
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
    <div class="wrapper-all">
      <div class="container-fluid">
        <div class="container"><?php print $messages; ?></div>
        <div>
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label>Server Name :</label>
            <input type="text" name="server" id="server" class="form-control">
            <label>Db Name :</label>
            <input type="text" name="db_name" id="db_name" class="form-control">
            <label>Db Username :</label>
            <input type="text" name="db_user" id="db_user" class="form-control">
            <label>Db Password :</label>
            <input type="password" name="db_pass" id="db_pass" class="form-control">
            <br>
            <input type="submit" class="btn btn-submit" name="submit" id="submit">
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="progress" id="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            working...
            <span class="sr-only"></span>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <div id="div1"></div>
  </div>
  <?php require 'config/footer.php'; ?>
</body>
</html> 
<script type="text/javascript">
$('#submit').click(function(event) {
  $('.form-control').attr('disabled','true');
   event.preventDefault();
   $('.wrapper-all').hide();
   $('#progress').show();
    var db_name = $('#db_name').val();
    var db_user = $('#db_user').val();
    var db_pass = $('#db_pass').val();
    var server  = $('#server').val();
    $.ajax({
      type: "POST",
      url: "config/create_tables.php",
      data: {server:server,db_name:db_name,db_user:db_user,db_pass:db_pass},
      success: function(result){
        $("#div1").html(result);
      }
    });
});
</script>
