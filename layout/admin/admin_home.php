<div class="twelve wide column centered" id="content_includer">
  <div class="ui center aligned basic segment">
    <div class="ui cards centered">
      
      <div class="card">
        <div class="content">
          <div class="header">Ajouter des professeurs</div>
          <div class="content">
            <br>
            <center>
              <img src="/assets/svg/undraw_Booking_re_gw4j.svg" height="100px">
            </center>
          </div>
        </div>
       
        <div class="ui bottom attached button" onclick="$('.prof_modal').modal('show');">

          <a href="#" id='adding'><i class="plus icon"></i>Ajouter</a>

        </div>
      </div>
      <div class="card">
        <div class="content">
          <div class="header">les matières que l'etudiant étduie</div>
          <div class="content">
            <center>
              <img src="/assets/svg/class.svg" height="100px">
            </center>
          </div>
        </div>
        <div class="ui bottom attached button" onclick="$('.class_modal').modal({ centered: false}).modal('show');">
          <a href="#" id='adding'><i class="plus icon"></i>Créer une classe</a>
        </div>
      </div>
      </div>
    <div class="ui section divider">
    </div>

  </div>
  <div class="ui cards centered">
    <div class="card">
      <div class="content">
        <div class="header">Gérer les listes d'étudiants</div>
        <div class="content">
          <center>
            <img src="/assets/svg/li_etudinat.svg" height="100px">
          </center>
        </div>
      </div>
      <!-- <div class="ui bottom attached button"> -->
      <!-- </div> -->
      <div class="extra content">
        <span>
          <i class="user icon"></i>
          <?php
          include 'php/db_conn.php';
          mysqli_select_db($conn, 'abs_users');
          $query = $conn->prepare('SELECT * FROM etudiant');
          $query->execute();
          $result = $query->get_result();
          echo $result->num_rows . ' Etudiants ';
          ?>
        </span>
      </div>
      <a class="ui bottom attached button" href=" ?ref_id=listEtudiant&min_val" id='adding'><i class="plus icon"></i>Consulter</a>

    </div>
    
    <div class="card">
      <div class="content">
        <div class="header">La list des support pédagogique</div>
        <div class="content">
          <center>
            <img src="/assets/svg/modules.svg" height="100px">

          </center>
        </div>
      </div>
      <!-- <div class="ui bottom attached button"> -->
      <!-- </div> -->
      <div class="extra content">
        <span>
          <i class="book icon"></i>
          <?php
          include 'php/db_conn.php';
          mysqli_select_db($conn, 'abs_users');
          $query = $conn->prepare('SELECT * FROM module');
          $query->execute();
          $result = $query->get_result();
          echo $result->num_rows . ' Matière ';
          ?>
        </span>
      </div>
      <a class="ui bottom attached button" href="?ref_id=listmodules" id='adding'><i class="plus icon"></i>Consulter</a>

    </div>
    <div class="card">
        <div class="content">
          <div class="header">La list des enseignants</div>
          <div class="content">
            <center>
              <img src="/assets/svg/profesor.svg" height="100px">
            </center>
          </div>
        </div>
        <div class="extra content">
          <span>
            <i class="user icon"></i>
            <?php
            include 'php/db_conn.php';
            mysqli_select_db($conn, 'abs_users');
            $query = $conn->prepare('SELECT * FROM professeur');
            $query->execute();
            $result = $query->get_result();
            echo $result->num_rows . ' enseignants ';
            ?>
          </span>
        </div>
          <a class="ui bottom attached button" href="?ref_id=listprof" id='adding'><i class="plus icon"></i>Consulter</a>
      </div>
    <div class="ui prof_modal modal">
      <i class="close icon"></i>
      <div class="header">
        Ajouter un professeur
      </div>
      <div class="content">
        <P id="addProfMessege"></P>
        <P id="addProfModuleMessege"></P>
        <div class="ui form ">
          <div class="field">
            <label for="selectLoginType">Choisissez le Departement</label>
            <select class="ui fluid search dropdown" id="selectLoginFac">
              <option></option>
              <option value="D_MATH">Departement de Mathématique</option>
              <option value="D_INF">Departement de Informatique</option>
              <option value="D_CH">Departement de Chimie</option>
              <option value="D_PH">Departement de Physique</option>
              <option value="D_MDD">Département de Matériaux et Développement Durable</option>
              <option value="D_PS">Département de Probabilités & Statistique</option>
            </select>
            <label> La speçialité </label>
            <select id="select_spec_prof" name="skills" class="ui fluid search dropdown">
              <?php
              include './php/db_conn.php';
              mysqli_select_db($conn, 'abs_users');
              $query = $conn->prepare('select * from specialite');
              $query->execute();
              $result = $query->get_result();
              echo '<option></option>';
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value=' . $row['specialte_id'] . '> ' .

                  $row['specialte_nom'] .

                  '</option>';
              }
              ?>
            </select>
          </div>
          <label for="append_modules_prof">Matières</label>
          <select id='append_modules_prof' name="prof_modules" multiple class="ui fluid search dropdown">
          </select>
          <div class="field">
            <label>Nom complete</label>
            <input type="text" autocomplete="false" id="prof_name" placeholder="Nom complete">
          </div>

          <div class="field">
            <label>Nom d'utilisateur</label>
            <input type="text" id="prof_user" placeholder="Utilisateur">
          </div>
          <div class="field">
            <label>Mot de pass (random)</label>
            <input type="password" id="prof_pass" placeholder="Mot de pass"><i onclick="showPass();" style="cursor:pointer; position: absolute; right: 0px;  font-size:1.5em; z-index:11112123;" class='eye icon'></i>
          </div>
        </div>
      </div>
      <div class="actions">
        <div class="ui black deny button">
          Annuler
        </div>
        <div id="add_prof" class="ui  right labeled icon button">
          Ajouter
          <i class="checkmark icon"></i>
        </div>
      </div>
    </div>
    <div class="class_modal ui longer test modal scrolling transition ">
      <i class="close icon"></i>
      <div class="header">
        Create une classe
      </div>

      <div class="description">
        <p id="class_messege"></p>
        <div class="ui grid">
          <div class="eight wide column">

            <div class="field">
              <label> Choiser une speçialité </label>
              <br>
              <br>
              <select id="select_spec" name="specialité" class="ui fluid search dropdown">
                <?php
                include './php/db_conn.php';
                mysqli_select_db($conn, 'abs_users');
                $query = $conn->prepare('select * from specialite');
                $query->execute();
                $result = $query->get_result();
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value=' . $row['specialte_id'] . '> ' .

                    $row['specialte_nom'] .

                    '</option>';
                }
                ?>
              </select>
            </div>

          </div>
          <div class='eight wide column'>
            <div class="field">
              <label> Choiser la matiére </label>
              <br>
              <br>
              <select id='append_modules' name="modules" class="ui fluid search dropdown">
              </select>
            </div>

          </div>

        </div>
        <div class="ui grid">
          <div class="sixteen wide column">
            <div class="field">
              <label> Ajouter des étudiants</label>
              <br>
              <br>
              <select id="select_etudiants" name="skills" multiple class="ui  search fluid dropdown">
                <?php
                include './php/db_conn.php';
                mysqli_select_db($conn, 'abs_users');
                $query = $conn->prepare('select * from etudiant');
                $query->execute();
                $result = $query->get_result();
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value=' . $row['id'] . '> ' .

                    $row['nom'] . '  ' .
                    $row['prenom'] .

                    '</option>';
                }
                ?>
              </select>
            </div>

          </div>
        </div>

      </div>
      <div class="actions">
        <div class="ui black deny button">
          Annuler
        </div>
        <button id="submitAddition" class="ui  labeled icon button">
          Create
          <i class="checkmark icon"></i>
        </button>
      </div>
    </div>
  </div>