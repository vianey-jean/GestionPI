  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.php?act=acc_pub">Accueil</a></li>
        </ul>

      </nav><!-- #nav-menu-container -->
    </div>



  </header><!-- #header -->

 <div class="masthead d-flex justify-content-center" id="page_conn">
    <section > 
    <form id="formulaire" action="index.php?act=conn" method="POST">
    <h3 style="text-align:center;">Connexion</h3>
      <h4 style="text-align:center;">Veuillez vous connecter.</h4>
      <fieldset>
        <input class="form-control mb-3" id="login" name="login" placeholder="Votre Identifiant" type="text"  required autofocus>
      </fieldset>
      <fieldset>
        <input class="form-control" id="pwd" name="pwd" placeholder="Votre mot de passe" type="password" required>
      </fieldset>
        <div class="mb-3" style="text-align:center;font-weight:bold;color:red;"><span  id="div_message"><?php echo isset($_SESSION['msg'])?$_SESSION['msg']:''; ?></span></div>    
      <fieldset>
        <a class="password-oublier" href="#">Mot de passe oublier</a>
      </fieldset>
      <fieldset>
        <button class="form-control btn btn-dark" name="form_connexion" type="submit" id="formulaire_submit">Validez</button>
      </fieldset>
      <input type='hidden' id='exec' name='exec' value='connexion'>
    </form>
    </section>  
</div>

  