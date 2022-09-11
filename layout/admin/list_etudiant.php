<div class="one wide column">

</div>

<div class="fourteen wide column" id="content_includer">

  <div class="ui small breadcrumb">
    <a class="section" href="?ref_id=home">Admin page</a>
    <i class="right chevron icon divider"></i>
    <a class="section">Gérer</a>
    <i class="right chevron icon divider"></i>
    <div class="active section">Gérer la list des etudiants</div>
  </div>
  <!-- <div class="ui divider"></div> -->

  <div class="ui top attached tabular menu">

    <a class="item" id="addEtudiant">
      <i class="plus icon"></i>
      Ajouté
    </a>

    <a class="item " data-tab="first">Les 10 derniers ajouts</a>
    <a class="item active" data-tab="second">Voir tous </a>


    <div class="right menu">
      <div class="ui item" id="operations" style="display: none;">
        <a class="item" id="SaveEdition">
          <i class="check circle green icon"></i>
          Enregistrer
        </a>
        <a class="item" id="AbortEdition">
          <i class="window close red icon"></i>
          Annuler
        </a>
      </div>
   

    </div>
  </div>
  <div class="ui bottom attached tab segment " data-tab="first">

    <?php
    include('php/db_conn.php');
    //echo $_GET['name'];
    if (isset($_GET['min_val']) || isset($_GET['max_val'])) {

      $sql = "SELECT * FROM `abs_users`.Etudiant   ORDER BY `etudiant`.`id` DESC  LIMIT  10";
      $result = $conn->query($sql);
      echo mysqli_error($conn);
      echo '
<table class="ui selectable striped green table order-table" id="lasttableEtudiant">
  ';
      echo '
  <thead>
    ';
      echo '
    <th></th>
    ';
      echo '
    <th></th>
    ';

      echo "
    <th>N° d'iscription</th>
    ";
      echo "
    <th>Mot de pass</th>
    ";
      echo '
    <th>Nom</th>
    ';
      echo '
    <th>Prénom</th>
    ';
      echo '
    ';
      echo '
    <th>Date de naissance</th>
    ';
      echo '
    <th>Faculté</th>
    ';
      echo '
    <th>département</th>
    ';
      echo '
    <th>Spécialité</th>
    ';
      echo '
    ';
      echo '
    <th>Groupe</th>
    ';
      echo '
    <th></th>
    ';


      echo '
  </thead>
  ';
      echo '
<tbody>
  ';
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {


          echo '
    <tr>
      ';
          echo '
      <td>
      <a class="item" id="checkRwo" etId=' . $row["id"] . '>
      <i class="check icon"></i>
      </a>
      <a class="item" id="abortRowEdit">
      <i class="close icon"></i>
      </a>
      </td>
      ';
          echo '<td>
      <a class="item " id="editTrow">
         <i class="edit outline icon"></i>
       </a>
     </td>';

          echo '
      <td origin-value="' . $row["num_inscription"] . '">' . $row['num_inscription'] . '</td>
      ';
          echo '
    <td origin-value="' . $row["pwd"] . '">' . $row['pwd'] . '</td>
    ';
          echo '
      <td origin-value="' . $row["nom"] . '">' . $row['nom'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["prenom"] . '">' . $row['prenom'] . '</td>
      ';
          echo '
      ';
          echo '
      <td origin-value="' . $row["date_naiss"] . '">' . $row['date_naiss'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["faculte"] . '">' . $row['faculte'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["departement"] . '">' . $row['departement'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["specialite"] . '">' . $row['specialite'] . '</td>
      ';
          echo '
      ';
          echo '
      <td origin-value=' . $row["grp"] . '>' . $row['grp'] .
            '</td>
      ';

          echo '
      <td>
      <a class="item" id="delTrow">
      <i class="trash icon"></i>
      </a>
      </td>
      ';


          echo '
    </tr>
    ';
        }
        echo '
  </tbody>
  ';
      } else {
        echo "Il n’y a pas de données";
      }
    } else {
      header('Location: profile.php?ref_id=home&err_page');
    }
    ?>
    </table>
  </div>
  <div class="ui bottom attached tab segment active" data-tab="second">
  <script>
  $(document).ready(function() {
    $('#tableEtudiant').DataTable();
} );
</script>
    <?php
    include('php/db_conn.php');
    //echo $_GET['name'];
    if (isset($_GET['min_val'])) {
      
      $sql = "SELECT * FROM `abs_users`.Etudiant  ";
      $result = $conn->query($sql);
      echo mysqli_error($conn);
      echo '
<table class="ui selectable striped blue table order-table active" id="tableEtudiant">
  ';
      echo '
  <thead>
    ';
      echo '
    <th></th>
    ';
      echo '
    <th></th>
    ';

      echo "
    <th>N° d'iscription</th>
    ";
      echo "
    <th>Mot de pass</th>
    ";
      echo '
    <th>Nom</th>
    ';
      echo '
    <th>Prénom</th>
    ';
      echo '
    ';
      echo '
    <th>Date de naissance</th>
    ';
      echo '
    <th>Faculté</th>
    ';
      echo '
    <th>département</th>
    ';
      echo '
    <th>Spécialité</th>
    ';
      echo '
    ';
      echo '
    <th>Groupe</th>
    ';
      echo '
    <th></th>
    ';


      echo '
  </thead>
  ';
      echo '
<tbody>
  ';
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '
    <tr>
      ';
          echo '
      <td>
      <a class="item" id="checkRwo" etId=' . $row["id"] . '>
      <i class="check icon"></i>
      </a>
      <a class="item" id="abortRowEdit">
      <i class="close icon"></i>
      </a>
      </td>
      ';
          echo '<td>
      <a class="item " id="editTrow">
         <i class="edit outline icon"></i>
       </a>
     </td>';

          echo '
      <td origin-value="' . $row["num_inscription"] . '">' . $row['num_inscription'] . '</td>
      ';

          echo '
    <td origin-value="' . $row["pwd"] . '">' . $row['pwd'] . '</td>
    ';
          echo '
      <td origin-value="' . $row["nom"] . '">' . $row['nom'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["prenom"] . '">' . $row['prenom'] . '</td>
      ';
          echo '
      ';
          echo '
      <td origin-value="' . $row["date_naiss"] . '">' . $row['date_naiss'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["faculte"] . '">' . $row['faculte'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["departement"] . '">' . $row['departement'] . '</td>
      ';
          echo '
      <td origin-value="' . $row["specialite"] . '">' . $row['specialite'] . '</td>
      ';
          echo '
      ';
          echo '
      <td origin-value=' . $row["grp"] . '>' . $row['grp'] .
            '</td>
      ';

          echo '
      <td>
      <a class="item" id="delTrow">
      <i class="trash icon"></i>
      </a>
      </td>
      ';

          echo '
    </tr>
    ';
        }
        echo '
  </tbody>
  ';
      } else {
        echo "Il n’y a pas de données";
      }
    } else {
      header('Location: profile.php?ref_id=home&err_page');
    }
    ?>


    </table>
  </div>

  <div class="ui modal" id="addEtudiantmodal">
    <i class="close icon"></i>
    <div class="header">Ajouter un nouvel étudiant</div>
    <br />
    <div id="err_mesg">

    </div>
    <br>
    <br>
    <div class="image content">
      <form method="">
        <div class="ui form">
          <div class="fields">
            <div class="six wide field">
              <label>N° d'inscription</label>
              <input id="num_inscr" type="number" placeholder="N° d'inscription" />
            </div>
            <div class="six wide field">
              <label>L'authentification</label>
              <input id="pwd" type="text" placeholder="Password d'access" />
            </div>
            <div class="four wide field">
              <label>Nom</label>
              <input id="nom" type="text" placeholder="Nom" />
            </div>
            <div class="six wide field">
              <label>Prénom</label>
              <input id="prenom" type="text" placeholder="Prénom" />
            </div>
            <div class="four wide field">
              <label>gender</label>
              <select id="gender" required>
                <option></option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="six wide field">
              <label>Date de Naissance</label>
              <input id="date_naiss" type="date" />
            </div>
          </div>
          <br />

          <div class="ui form">
            <div class="fields">
              <div class="four wide field">
                <label>Faculté</label>
                <input id="faculte" type="text" placeholder="Faculté" />
              </div>
              <div class="four wide field">
                <label>département</label>
                <input id="departement" type="text" placeholder="département" />
              </div>
              <div class="four wide field">
                <label>spécialite</label>
                <select id="specialite" name="skills" class="ui fluid search dropdown">
                  <?php
                  include './php/db_conn.php';
                  mysqli_select_db($conn, 'abs_users');
                  $query = $conn->prepare('select * from specialite');
                  $query->execute();
                  $result = $query->get_result();
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value=' . $row['specialte_nom'] . '> ' .

                      $row['specialte_nom'] .

                      '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="four wide field">
                <label>Groupe</label>
                <select id="Groupe" required>
                  <option></option>
                  <option value="1"></option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                </select>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="actions">
      <div class="ui black deny button" id="addEtudiantDeny">Annuler</div>
      <button class="ui right labeled icon button" id="addEtudiantConfirm">
        Envoyer
        <i class="checkmark icon"></i>
      </button>
      <br>
      <br>

      </form>
    </div>
    <div class="ui  basic test modal" id="editmodel">
      <div class="ui icon header">
        <i class="save icon"></i>
        <p>Voulez-vous enregistrer les modifications??</p>

      </div>

      <div class="actions">

        <div class="ui green ok inverted button">
          <i class="checkmark icon"></i>
          Oui
        </div>
        <div class="ui red basic cancel inverted button">
          <i class="remove icon"></i>
          Non
        </div>
      </div>
    </div>

  </div>
</div>
<div class="one wide column">

</div>
<script src="/js/admin/edit_etud.js"></script>
<script src="/js/admin/add_etudiant.js"></script>