<?php
class C_Stat {

        function Liste_absence_etudient_parMatiere($codeEtudiant, $codeMatiere, $dateD, $dateF) {
            require_once('config.php');
            $mysqli = new mysqli(db_host, db_user, db_password, db_database);
    
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }
    
            $sql = "
            SELECT 
                fa.DateJour AS DateDuJour,
                e.Nom AS Enseignant,
                s.NomSeance AS Seance,
                COUNT(lfa.CodeFicheAbsence) AS NombreAbsences
            FROM 
                T_LigneFicheAbsence lfa
            JOIN 
                T_FicheAbsence fa ON lfa.CodeFicheAbsence = fa.CodeFicheAbsence
            JOIN 
                T_Etudiant e ON lfa.CodeEtudiant = e.CodeEtudiant
            JOIN 
                T_FicheAbsenceSeance fas ON fa.codeFicheAbsence = fas.CodeFicheAbsence 
            JOIN 
                T_Seance s ON fas.CodeSeance = s.CodeSeance 
            WHERE 
                fa.CodeMatiere = $codeMatiere
                AND fa.DateJour BETWEEN '$dateD' AND '$dateF' 
                AND lfa.CodeEtudiant = $codeEtudiant
            GROUP BY 
                fa.DateJour, e.Nom, s.NomSeance;
            ";
    
            $res = $mysqli->query($sql);
            $mysqli->close();
    
            return $res;
        }
    

    function Liste_absence_etudient($nomEtudiant, $prenomEtudiant, $dateD, $dateF, $nomClasse) {
        require_once('config.php');
        $mysqli = new mysqli(db_host, db_user, db_password, db_database);        
        
        $sql = "SELECT 
                    m.NomMatiere AS Matiere,
                    COUNT(lfa.CodeFicheAbsence) AS NombreAbsences
                FROM 
                    T_LigneFicheAbsence lfa
                JOIN 
                    T_FicheAbsence fa ON lfa.CodeFicheAbsence = fa.CodeFicheAbsence
                JOIN 
                    T_Etudiant e ON lfa.CodeEtudiant = e.CodeEtudiant
                JOIN
                    T_Matiere m ON fa.CodeMatiere = m.CodeMatiere
                JOIN
                    T_Classe c ON e.CodeClasse = c.CodeClasse
                WHERE 
                    e.Nom = '$nomEtudiant' 
                    AND e.Prenom = '$prenomEtudiant'
                    AND c.NomClasse = '$nomClasse'
                    AND fa.DateJour BETWEEN '$dateD' AND '$dateF'
                GROUP BY 
                    m.NomMatiere;";
        
        $res = $mysqli->query($sql);															
        $mysqli->close();
        return $res; 
    }
    
}

?>