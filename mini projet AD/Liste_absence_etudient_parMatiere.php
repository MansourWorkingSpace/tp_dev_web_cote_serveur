<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absences par Matière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Afficher la liste des absences par matiere </h1>

        <form action="" method="POST">
            <label for="Date_debut">Date_debut:</label>
            <input type="date" id="Date_debut" name="Date_debut" required>
            <br><br>
            <label for="Date_fin">Date_fin:</label>
            <input type="date" id="Date_fin" name="Date_fin" required>
            <br><br>
            <label for="matiere">Sélectionner une Matière:</label>
            <select id="matiere" name="matiere" class="form-control" required>
                <option value="">--Sélectionnez une Matière--</option>
                <?php
                require_once('config.php');
                $mysqli = new mysqli(db_host, db_user, db_password, db_database);

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                $sql = "SELECT CodeMatiere, NomMatiere FROM T_Matiere";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['CodeMatiere'] . "'>" . $row['NomMatiere'] . "</option>";
                    }
                }
                $mysqli->close();
                ?>
            </select>
            <br><br>
            <br><br>

            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            <br><br>
            <label for="prenom">Prenom:</label>
            <input type="text" id="prenom" name="prenom" required>
            <br><br>            

            <button type="submit" name="submit" class="btn btn-primary">Afficher les Absences</button>
        </form>
       

        <?php
        
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $matiere = $_POST['matiere'];
    $dateDebut = $_POST['Date_debut'];
    $dateFin = $_POST['Date_fin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $mysqli = new mysqli(db_host, db_user, db_password, db_database);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT CodeEtudiant FROM T_Etudiant WHERE Nom = '$nom' AND Prenom = '$prenom'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $codeEtudiant = $row['CodeEtudiant'];
    } else {
        echo '<div class="alert alert-warning mt-4">Etudiant non trouvé.</div>';
        $mysqli->close();
        exit();
    }

    require_once('stat.php');
    $stat = new C_Stat();

    $results = $stat->Liste_absence_etudient_parMatiere($codeEtudiant, $matiere, $dateDebut, $dateFin);
    
    if ($results->num_rows > 0) {
        echo '<table class="table table-bordered table-striped mt-4">';
        echo '<thead class="table-dark">';
        echo '<tr>';
        echo '<th>Date du Jour</th>';
        echo '<th>Enseignant</th>';
        echo '<th>Seance</th>';
        echo '<th>Nombre d\'Absences</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $totalAbsences = 0;

        while ($row = $results->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['DateDuJour'] . '</td>';
            echo '<td>' . $row['Enseignant'] . '</td>';
            echo '<td>' . $row['Seance'] . '</td>';
            echo '<td>' . $row['NombreAbsences'] . '</td>';
            echo '</tr>';

            $totalAbsences += $row['NombreAbsences'];
        }
        echo '</tbody>';
        echo '</table>';

        echo '<div class="alert alert-info mt-4">Le nombre total d\'absences pour cette matière est : ' . $totalAbsences . '</div>';
    } else {
        echo '<div class="alert alert-warning mt-4">Aucune absence trouvée pour cette matière.</div>';
    }

    $mysqli->close();
}
?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
