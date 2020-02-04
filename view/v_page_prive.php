  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#hero">Accueil</a></li>
          <li><a href="#pc">Listes des Ordinateurs</a></li>
          <li><a href="#ajout">Ajouter Stagiaire</a></li>
          <li><a href="#attribuer">Attribuer un Pc</a></li>
          <li><a href="index.php?act=dec">Déconnexion</a></li>
        </ul>

      </nav><!-- #nav-menu-container -->
    </div>



  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section class="masthead d-flex" id="hero">
     <div class="container text-center my-auto">
        <h1 class="mb-2">Attribution des Postes Informatiques à des visiteurs </h1>
        <h4 class="mb-5">
          <em>Créer par Jean Marie Vianey R.</em>
        </h4>
      </div>
      
  </section><!-- #hero -->

  <main id="main">

    <!-- Liste d'Ordinateurs -->
    <section class="content-section bg-light" id="pc">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2>Liste des Stagiaires</h2>
            
     
      <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col">Nom</th>
          <th scope="col">Prénom</th>         
          <th scope="col">Reference du PC</th>
          <th scope="col">Horaire du Reservation</th>
          <th scope="col">Assignation</th>
         
        </tr>
        </thead>
        <tbody>
          <?php 
            
          if(count($select_reservation)>0){$res = mysqli_query($db, "select * from jm_users where login = '"."admin22"."' password = '"."1234"."'"); 
echo $res;
              $k = 0;
            foreach($select_reservation as $reservation){
              $k++;
              ?>
              <tr>
              <th scope="row"><?php echo $k; ?></th>
              <!-- On afficher la ligne d'informations  sous la forme ( nom, prenom, horaire, -->
              <td><?php echo htmlspecialchars_decode($reservation['nomStagReserv'], ENT_QUOTES); ?></td>
              <td><?php echo htmlspecialchars_decode($reservation['prenomStagReserv'], ENT_QUOTES); ?></td>
              <td><?php echo $reservation['colResev']; ?></td>
              <td><?php echo $reservation['horaireResev']; ?></td>
              <td><a href="index.php?act=jm_Reservation&reservID=
              <?php echo $reservation['idReserv']; echo $res;?>&&exec=retirer_ass"><button style="cursor: pointer;" type="button" class="btn-sm btn-danger">Retirer l'assignation</button></a></td>
             
            </tr><?php
            }
          } else {
            ?>
            <tr>
              <td colspan="6"><h5 style="margin: 0; font-weight: normal;">Pas de réservations</h5></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
        </div>
      </div>
    </section>

    <!-- Création d'un nouvel utilisateur -->
    <section class="content-section bg-primary text-white text-center" id="ajout">
      <div class="container text-center">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">Stagiaires</h3>
          <h2 class="mb-5">Ajout d'un nouvel Stagiaire</h2>
   
      <form class="container text-center" action="index.php?act=user&exec=aj_user" method="post">
          <div class="form-row align-items-center content-section-heading">
            <input type="text" class="form-control" id="inlineFormInputName" name="nomStag" placeholder="Nom"></br>
            <input type="text" class="form-control" id="inlineFormInputName" name="prenomStag" placeholder="Prénom"><br></br><br></br>
            <button type="submit" class="btn btn-warning container">Ajouter</button>
          </div>
      </form>
        </div>
      </div>
    </section>

   <!-- Formulaire qui permet d'attribuer un poste à un étudiant -->
   <section class="content-section bg-primary text-white text-center" id="attribuer">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0">PC</h3>
          <h2 class="mb-5">Attribuer un PC</h2>

        <form action="index.php?act=computer&exec=attr_computer" method="post">
          <div class="btn-group" style="margin-left: 30px;">
          
            <select class="selectpicker" data-style="btn-warning" name="etudiant_nom" data-live-search="true" style="margin-left: 30px;">
            <option data-tokens="student_1">Stagiaires</option>
            <?php 
              
              foreach($select_etudiant as $etudiant){
                echo '<option data-tokens="student_'.$ii.'" value="'.$etudiant['idStag'].'">'.htmlspecialchars_decode($etudiant['nomStag'], ENT_QUOTES).', '.htmlspecialchars_decode($etudiant['prenomStag'], ENT_QUOTES).'</option>';
              } 

            ?>
          </select>
          <div style="margin-left: 30px;">
            <select class="selectpicker" name="horaireResev" data-style="btn-warning" style="margin-left: 30px;">
                <option>Horaires</option>
              <option value="09:30">09:30</option>
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="13:00">13:00</option>
              <option value="13:30">13:30</option>
              <option value="14:00">14:00</option>
              <option value="14:30">14:30</option>
              <option value="15:00">15:00</option>
              <option value="15:30">15:30</option>
              <option value="16:00">16:00</option>
              <option value="16:30">16:30</option>
            </select>
          </div>
          <div style="margin-left: 30px;">
            <select class="selectpicker" name="idPc" data-style="btn-warning" style="margin-left: 30px;">
              <option>Ref PC</option>
              <?php 
                foreach($select_ordinateur as $Ordinateur){
                  echo '<option value="'.$Ordinateur['idPc'].'">Ordinateur '.$Ordinateur['refPc'].'</option>';
                }
                 ?>
            </select>
            <button type="submit" class="btn btn-warning" style="margin-left: 30px;">Ajouter</button>
          </div>
        </div>
        </form>
    </div>  
    </div>
  </div>
    </section>



  </main>