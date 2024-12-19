<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Absences</title>
    <!-- Lien vers Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Liste des Absences par Semaine</h1>
        
        <form method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-md-5">
                    <label for="datedebut" class="form-label">Date Début :</label>
                    <input type="date" name="datedebut" id="datedebut" class="form-control" required>
                </div>
                <div class="col-md-5">
                    <label for="datefin" class="form-label">Date Fin :</label>
                    <input type="date" name="datefin" id="datefin" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                </div>
            </div>
        </form>

        <?php
        require_once('config.php');

        if (isset($_GET['datedebut']) && isset($_GET['datefin'])) {
            $datedebut = $_GET['datedebut'];
            $datefin = $_GET['datefin'];

            $mysqli = new mysqli(db_host, db_user, db_password, db_database);

            if ($mysqli->connect_error) {
                die("<div class='alert alert-danger'>Erreur de connexion à la base de données : " . $mysqli->connect_error . "</div>");
            }

            $sql = "
                SELECT 
                    f.DateJour,
                    DAYNAME(f.DateJour) AS jourSemaine,
                    m.nomMatiere,
                    e.nom AS nomEnseignant,
                    e.prenom AS prenomEnseignant,
                    et.nom AS nomEtudiant,
                    et.prenom AS prenomEtudiant
                FROM 
                    t_ficheabsence f
                JOIN 
                    t_matiere m ON f.codeMatiere = m.codeMatiere
                JOIN 
                    t_enseignant e ON f.codeEnseignant = e.codeEnseignant
                JOIN 
                    t_ligneficheabsence l ON f.codeFicheAbsence = l.codeFicheAbsence
                JOIN 
                    t_etudiant et ON l.codeEtudiant = et.codeEtudiant
                WHERE 
                    f.DateJour BETWEEN '$datedebut' AND '$datefin'
                ORDER BY 
                    f.DateJour ASC;
            ";

            $result = $mysqli->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<table class='table table-bordered table-striped mt-4'>";
                echo "<thead class='table-dark'>
                        <tr>
                            <th>Date</th>
                            <th>Jour de la Semaine</th>
                            <th>Matière</th>
                            <th>Enseignant</th>
                            <th>Étudiant</th>
                        </tr>
                      </thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['DateJour']}</td>
                            <td>" . ucfirst(strftime('%A', strtotime($row['jourSemaine']))) . "</td>
                            <td>{$row['nomMatiere']}</td>
                            <td>{$row['prenomEnseignant']} {$row['nomEnseignant']}</td>
                            <td>{$row['prenomEtudiant']} {$row['nomEtudiant']}</td>
                          </tr>";
                }

                echo "</tbody></table>";
            } else {
                echo "<div class='alert alert-warning'>Aucune absence trouvée pour cette période.</div>";
            }

            $mysqli->close();
        }
        ?>
    </div>
    <!-- Lien vers Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
