<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/login/login.css" />
    <title>login page</title>
  </head>
  <body>
      <div class="row">

          <div class="col-sm-6">
              <h4 class="text-primary">Gestion des absences</h3>
                <p class="description">Ce site permet à l'utilisateur, qu'il soit étudiant, professeur ou directeur,
                   de visualiser les absences et de faciliter leur gestion</p>
                  
                <img src="/assets/img/Logo_UDLtransparent.png" alt="udl sba logo" id="udl_logo">
                <br>
                <br>
                <div class="alert alert-danger  fade show" role="alert" id='alert' style='display:none;'>
                </div>

                
            </div>  

    <form id="login_form" class="col-sm-6">
            <hr>
      <div class="form-group">
        <label for="selectLoginType">Choisissez le Departement</label>
        <select class="form-control" id="selectLoginFac" required>
          <option></option>
          <option value="D_MATH">Departement de Mathématique</option>
          <option value="D_INF">Departement de Informatique</option>
          <option value="D_CH">Departement de Chimie</option>
          <option value="D_PH">Departement de Physique</option>
          <option value="D_MDD">Département de Matériaux et Développement Durable</option></option>
          <option value="D_PS">Département de Probabilités & Statistique</option>
        </select>
      </div>
      <div class="form-group">
        <label for="selectLoginType">Choisissez le type de connexion</label>
        <select class="form-control" id="selectLoginType" required>
          <option></option>
          <option value="admin">َAdministarteur</option>
          <option value="prof">Professeur</option>
          <option value="chefDep">Chef Departement</option>
          <option value="Etud">Etudiant</option>
        </select>
      </div>
      <div class="form-group">
        <label for="user">Nom d'utilisateur</label>
        <input
          type="user"
          class="form-control"
          id="user"
          placeholder="Enter User name"
        />
        <small id="userhelp" class="form-text text-muted"
          >Nous ne partagerons jamais votre user avec qui que ce soit.</small
        >
      </div>
      <div class="form-group">
        <label for="password">Mot de pass</label>
        <input
          type="password"
          class="form-control"
          id="password"
          placeholder="Password"
        />
      </div>

      <button type="submit" class="btn btn-primary" id='formSub'>Submit</button>
    </form>
    <div id='ajaxDiv'></div>
</div>

  </body>
  <script src="/js/jqeury.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
  <script src="/login/login.js"></script>
  
</html>

