<?php   
  require 'config/head.php';
  require 'config/vars.php';
  // require 'config/create_tables.php'; 
?>
<?php
if (!file_exists('config/settings.sky')) {
  header('Location: /install.php');
}
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
              <li><a href="javascript:void(0)">About</a></li>
              <li><a href="javascript:void(0)">Contact</a></li> 
              <li><a href="javascript:void(0)">Support</a></li> 
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <dir class="wrapper-all">
      <div class="container-fluid">
        <div class="container"><?php print $messages; ?></div>
      </div>
    </dir>
  </div>
  <?php require 'config/footer.php'; ?>
</body>
</html> 