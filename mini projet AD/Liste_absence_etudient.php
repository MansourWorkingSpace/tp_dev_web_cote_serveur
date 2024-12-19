<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Absences by Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Afficher les absence totale d'un etudiant</h1>
    <form action="" method="POST">
        <label for="Date_debut">Date_debut:</label>
        <input type="date" id="Date_debut" name="Date_debut" required>
        <br><br>
        <label for="Date_fin">Date_fin:</label>
        <input type="date" id="Date_fin" name="Date_fin" required>
        <br><br>
        
        <label for="class">Classe:</label>
        <select id="class" name="class" required>
          <option value="">--Selectionnez un classe--</option>
          <?php
          require_once('config.php');

          $mysqli = new mysqli(db_host, db_user, db_password, db_database);

          if ($mysqli->connect_error) {
              die("Connection failed: " . $mysqli->connect_error);
          }


          $sql = "SELECT NomClasse FROM T_Classe";
          $result = $mysqli->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['NomClasse'] . "'>" . $row['NomClasse'] . "</option>";
              }}

          $mysqli->close();
          ?>
        </select>
        <br><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>
        <label for="prenom">Prenom:</label>
        <input type="text" id="prenom" name="prenom" required>
        <br><br>

        <button type="submit" name="submit" class="btn btn-primary">Search Absences</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $dateDebut = $_POST['Date_debut'];
        $dateFin = $_POST['Date_fin'];
        $class = $_POST['class'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $mysqli = new mysqli(db_host, db_user, db_password, db_database);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        require_once('stat.php');

        $stat = new C_Stat();
        $results = $stat->Liste_absence_etudient($nom, $prenom, $dateDebut, $dateFin, $class);

        if ($results->num_rows > 0) {
            echo '<table class="table table-bordered table-striped mt-4">';
            echo '<thead class="table-dark">';
            echo '<tr>';
            echo '<th>Matière</th>';
            echo '<th>Total Absences</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
        
            $count = 1;
            while ($row = $results->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Matiere'] . '</td>'; 
                echo '<td>' . $row['NombreAbsences'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-warning mt-4">No absences found for the specified date range.</div>';
        }
    }
        ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
