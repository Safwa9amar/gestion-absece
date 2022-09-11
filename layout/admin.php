<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/assets/img/Logo_UDLtransparent.png" type="image/x-icon">
  <title>
    <?php echo $_SESSION['permission'] . '|' . '  Guestion des abcense'; ?>
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.7/semantic.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.7/semantic.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js  "></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.semanticui.min.js  "></script>

  <link rel="stylesheet" href="dist/css/admin.css">
</head>

<body>
  <div class="ui grid">
    <div class="sixteen wide column">
      <div class="ui   menu">
        <a class="item" href="?ref_id=home">
          <img src="assets/img/Logo_UDLtransparent.png" alt="udl logo" class="src">
          Accueil
        </a>
        <div class="ui simple dropdown item">
          <i class="folder open icon"></i>
          Gérer
          <i class="dropdown icon"></i>
          <div class="menu">

            <a class="item" href='?ref_id=listAbsence'>
              <i class="calendar check outline icon"></i>
                     La liste des Absences
            </a>

            <a class="item" href='?ref_id=listEtudiant&min_val'>
              <i class="user icon"></i>
               Les listes d'étudiants
            </a>
          </div>
        </div>
        <div class="ui simple dropdown item">
          <i class="folder icon"></i>
          Consulter
          <div class="menu">

            <a class="item" href='?ref_id=listmodules'>

              <i class="book icon"></i>
              La liste des Matières
            </a>
            <a class="item" href='?ref_id=listprof'>
              <i class="user icon"></i>
              La liste des enseignants
            </a>
          </div>
        </div>




        <div class="right menu">
         
          <div class="item">

            <i class='user icon'></i>
            <div class="ui icon input">
              <?php echo  $_SESSION['username']  . ' <br><br> ' . $_SESSION['permission']; ?>
            </div>
          </div>

        </div>

      </div>
    </div>
    <div class="sixteen wide column">

      <div class="ui grid">
        <?php
        include('admin/include.php')

        ?>
      </div>
    </div>
    <!-- <div class="three wide column">
  
    </div> -->

  </div>
</body>
<script src="/js/app.js"></script>
<script src="/js/admin/admin_home.js"></script>
<script src="/js/admin/abcence.js"></script>


</html>