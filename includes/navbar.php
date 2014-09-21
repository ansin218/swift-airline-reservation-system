  <!-- Website Navigation Bar placed here -->

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./index.php" class="navbar-brand">Swift Airlines</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="#">About</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
<?php 
    if(f_logged_in() === true) {
      include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/widgets/f-logout.php';
    } 
    else {
   include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/widgets/w-login.php';
}?> 
     