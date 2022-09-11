<div class="two wide">
</div>
<div class="twelve wide column centered" id="content_includer">
  <div class="ui bottom attached tab segment active" data-tab="second">
    <script>
      $(document).ready(function() {
        $('#abstble').DataTable();
      });
    </script>
    <table class="ui  selectable  yellow table  order-table" id="abstble">
      <?php
      include('php/db_conn.php');
      $conn->select_db("abs_users");
      if (true) {
        $sql = "SELECT  etudiant.*, module.*,absence.*
      FROM  absence 
      inner join etudiant on etudiant.id = absence.etudant_id
      inner join module on module.id = absence.mod_id";
        $result = $conn->query($sql);
        echo mysqli_error($conn);

        echo '
        <thead>
          ';


        echo '
          <th>Nom complete</th>
          ';

        echo '
          <th>département</th>
          ';
        echo '
          <th>Spécialité</th>
          ';

        echo '
          <th>Groupe</th>
          ';

        echo '
          <th>Le module</th>
          ';
        echo '
          <th>Heure d\'absence</th>
          ';
        echo '
          <th>La date d\'absence</th>
          ';
        echo '
          <th>justification</th>
          ';
        echo '
          <th>type de justification</th>
          ';

        echo '
        </thead>
        ';
        echo '
        <tbody>
        ';
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {

            if ($row['justification'] == 'oui') {
              echo '<tr class="ui green message">';
            }
            if ($row['justification'] == 'non') {
              echo '<tr class="ui red message">';
            }

            // echo '<td origin-value="' . $row["num_inscription"] . '">' . $row['num_inscription'] . '</td>';
            echo '<td origin-value="' . $row["nom"] .  '">' . $row["num_inscription"] . ' | ' . $row['nom'] . ' | ' . $row["prenom"] . '</td>';
            echo '<td origin-value="' . $row["departement"] . '">' . $row['departement'] . '</td>';
            echo '<td origin-value="' . $row["specialite"] . '">' . $row['specialite'] . '</td>';
            echo '<td origin-value=' . $row["grp"] . '>' . $row['grp'] . '</td>';
            echo '<td origin-value=' . $row["nom_mod"] . '>' . $row['nom_mod'] . '</td>';
            echo '<td origin-value=' . $row["time_abs"] . '>' . $row['time_abs'] . '</td>';
            echo '<td origin-value=' . $row["date_abs"] . '>' . $row['date_abs'] . '</td>';
            echo '<td>
                <select id=' . $row['abs_id'] . '>
                  <option>' . $row['justification'] . '</option>
                  <option value="non">Non</option>
                  <option value="oui">Oui</option>
                </select>
                     </td>
               ';

            echo '
            <td>
                <select disabled>
                    <option value' . $row['type_justification'] . '>' . $row['type_justification'] . '</option>
                        <option></option>
                        <option value"accident">accident</option>
                        <option value"malade">malade</option>
                        <option value"familiale">familiale</option>
                        <option value"militaire">militaire </option>
                        <option value"Autre">Autre</option>
                </select>
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
</div>
<div class="one wide column">

</div>
