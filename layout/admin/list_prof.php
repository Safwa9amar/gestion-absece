    <div class='two wide column'> 
        <div class="ui  basic test modal" id="editmodel">
                <div class="ui icon header">
                  <i class="save icon"></i>
                  <p>Voulez-vous supprimer ?</p>
          
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
    <div class='twelve wide column'>
            <div class="ui bottom attached tab segment active" data-tab="second">
                <script>
                    $(document).ready(function() {
                        $('#lasttableEtudiant').DataTable();
                    });
                </script>
                <?php
                include('php/db_conn.php');
                //echo $_GET['name'];
                if (isset($_GET['ref_id'])) {

                    $sql = "SELECT * FROM `abs_users`.professeur  ";
                    $result = $conn->query($sql);
                    echo mysqli_error($conn);
                    echo '
        <table class="ui selectable striped green table order-table" id="lasttableEtudiant">
            ';
                    echo '
            <thead>
            ';
             
                        echo "
                <th>N° id</th>
                ";
                        echo "
                <th>Nom</th>
                ";
                        echo '
                <th>departement</th>
                ';
                        echo '
                <th>Nom d\'utilisateur</th>
                ';
                        echo '
                ';
                        echo '
                <th>Mot de pass</th>
                ';
                        echo '
                <th>Permission</th>
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
                        <td origin-value="' . $row["id"] . '">' . $row['id'] . '</td>
                        ';
                                echo '
                        <td origin-value="' . $row["nom_prof"] . '">' . $row['nom_prof'] . '</td>
                        ';
                                echo '
                        <td origin-value="' . $row["departement"] . '">' . $row['departement'] . '</td>
                        ';
                                echo '
                        ';
                                echo '
                        <td origin-value="' . $row["user_name"] . '">' . $row['user_name'] . '</td>
                        ';
                                echo '
                        <td origin-value="' . $row["pwd"] . '">' . $row['pwd'] . '</td>
                        ';
                                echo '
                        <td origin-value="' . $row["permission"] . '">' . $row['permission'] . '</td>
                        ';
                                echo '
                        <td>
                        <a class="item" id="delTrow">
                        <i class="trash icon" data-rem="' . $row["id"] . '"></i>
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
    </div>

    <script>
        let rem = document.querySelectorAll('[data-rem]');
        rem.forEach(element => {
          element.addEventListener('click',(e)=>{
        
                $('.ui.basic.test.modal')
                .modal({
                // closable  : false,
                onDeny    : function(){
                // window.location.reload;
                
                },
                onApprove : function() {
                
                let delprof = '?&del_prof=' + e.target.getAttribute('data-rem');
                $.ajax({
                        url: "php/add_prof.php",
                        type: "get",
                        data: delprof,
                        success: function (response) {
                        // console.log(response)
                          window.location.reload();
                        },
                })
                }
                })
                .modal('show');

                })
        })

</script>

