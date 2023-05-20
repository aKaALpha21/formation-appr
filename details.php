<?php
require 'config.php';

?>
<?php if (isset($_POST["submit"])) {
    $id_apprenant = $_SESSION['id_apprenant'];
    $id_session = $_GET['id'];

    // Retrieve the maximum capacity of the session
    $max_capacity_stmt = $conn->prepare("SELECT nombre_de_place FROM sessions WHERE id_session = ?");
    $max_capacity_stmt->bind_param('i', $id_session);
    $max_capacity_stmt->execute();
    $max_capacity_result = $max_capacity_stmt->get_result();
    $max_capacity = $max_capacity_result->fetch_assoc()['nombre_de_place'];

    // Retrieve the session information
    $stmt = $conn->prepare("SELECT * FROM sessions WHERE id_session = ?");
    $stmt->bind_param('i', $id_session);
    $stmt->execute();
    $session_result = $stmt->get_result();
    $session = $session_result->fetch_assoc();

    // Count the number of learners already registered for the session
    $num_registered_stmt = $conn->prepare("SELECT COUNT(*) FROM inscription WHERE id_session = ?");
    $num_registered_stmt->bind_param('i', $id_session);
    $num_registered_stmt->execute();
    $num_registered_result = $num_registered_stmt->get_result();
    $num_registered = $num_registered_result->fetch_assoc()['COUNT(*)'];

    if ($num_registered >= $max_capacity) {
        echo "<div class='alert alert-danger'>Désolé, cette session est complète. Le nombre maximum d'inscriptions a été atteint</div>";
      
    } elseif ($session['etat'] === 'completed' || $session['etat'] === 'clôturée' || $session['etat'] === 'Annulée' || $session['etat'] === 'en cours') {
        // Display a message indicating that the session is not available for registration
        echo "<div class='alert alert-danger'>Désolé, cette session n'est pas disponible à l'inscription pour le moment</div>";
       
    } else {
        // Check if the trainee is already registered for another course on the same date
        $stmt = $conn->prepare("SELECT * FROM sessions WHERE id_session = ?");
        $stmt->bind_param('i', $id_session);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $date_fin = $row['date_fin'];
        $date_debut = $row['date_debut'];

        if (is_array($row) && isset($row['date_debut'])) {
            $overlapSessionsStmt = $conn->prepare("SELECT COUNT(*) FROM inscription i 
                INNER JOIN sessions s ON s.id_session = i.id_session
                WHERE i.id_apprenant = ? AND (
                    (s.date_debut >= ? AND s.date_debut <= ?)
                    OR (s.date_fin >= ? AND s.date_fin <= ?)
                    OR (s.date_debut <= ? AND s.date_fin >= ?)
                )");
            $overlapSessionsStmt->bind_param('issssss', $id_apprenant, $date_debut, $date_fin, $date_debut, $date_fin, $date_debut, $date_fin);
            $overlapSessionsStmt->execute();
            $overlapSessionsResult = $overlapSessionsStmt->get_result();
            $overlapSessionsData = $overlapSessionsResult->fetch_assoc()['COUNT(*)'];

            // Check if the trainee is already enrolled in this session
            $alreadyEnrolledStmt = $conn->prepare("SELECT * FROM inscription WHERE id_apprenant = ? AND id_session = ?");
            $alreadyEnrolledStmt->bind_param('ii', $id_apprenant, $id_session);
            $alreadyEnrolledStmt->execute();
            $alreadyEnrolledResult = $alreadyEnrolledStmt->get_result();
            $alreadyEnrolledData = $alreadyEnrolledResult->fetch_all(MYSQLI_NUM);

            // Check if the trainee has enrolled in more than 2 other sessions
            $current_year = date('Y');
            $stmt = $conn->prepare("SELECT s.* FROM inscription i
                                    INNER JOIN sessions s ON s.id_session = i.id_session
                                    WHERE i.id_apprenant = ? AND YEAR(s.date_debut) = ?");
            $stmt->bind_param('ii', $id_apprenant, $current_year);
            $stmt->execute();
            $registered_sessions_result = $stmt->get_result();
            $registered_sessions = $registered_sessions_result->fetch_all(MYSQLI_ASSOC);

            if (count($alreadyEnrolledData) == 0 && count($registered_sessions) < 2 && $overlapSessionsData == 0) {

                $insertStmt = $conn->prepare("INSERT INTO inscription(id_apprenant, id_session) VALUES (?, ?)");
                $insertStmt->bind_param('ii', $id_apprenant, $id_session);
                $insertStmt->execute();

               
       echo "<div class='alert alert-success'>success</div>";

            } elseif ($overlapSessionsData > 0) {
                echo "<div class='alert alert-danger'>Vous êtes déjà inscrit à un cours à la même date</div>";

            } elseif (count($alreadyEnrolledData) > 0) {

               
       echo "<div class='alert alert-danger'>Vous êtes déjà inscrit pour cette session!</div>";
       ;

            } elseif (count($registered_sessions) >= 2) {
                "<div class='alert alert-danger'>Vous avez déjà rejoint 2 sessions</div>";
            } else {
               echo "<div class='alert alert-danger'>Vous êtes déjà inscrit à un cours à la même date</div>";
               

            }


        } else {
           echo "<div class='alert alert-danger'>Oups, quelque chose s'est mal passé</div>";
          
        }
       


}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detail.scss">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>detail</title>
</head>

<body>
    <?php
$id_formation = $_GET['id'];
$user_id = $_SESSION['id_apprenant'];
 
$result = mysqli_query($conn, "SELECT * FROM formation WHERE id_formation = '$id_formation'");
$row = mysqli_fetch_assoc($result);

echo'

<section class="">
	<div class="container py-4">
		<h1 class="h1 text-center" id="pageHeaderTitle">'.$row['titre'].'</h1>

		<article class=" dark blue">
        <div class="d-flex">
        <div>
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="'.$row['image'].'" alt="Image Title" />
			</a>
        </div>
			<div class="postcard__text">
				<p class="paragraph">Description</p>
				<div class="postcard__preview-txt text-light">'.$row['description'].'</div><br>';

                
                    
			
            
$result = mysqli_query($conn, "SELECT * FROM sessions WHERE id_formation = '$id_formation'");
// Loop through sessions and display each one in a card
while ($row2 = mysqli_fetch_assoc($result)) {
    ?>
    <form method="post" action="#">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">Session number : <?php echo $row2['id_session'];?></h4>
                <h5 class="card-title">Session etat :<?php echo $row2['etat'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Start <?php echo $row2['date_debut'];?> - end
                    <?php echo $row2['date_fin'];?></h6>
                <p class="card-text">Nombre de places disponibles: <?php echo $row2['nombre_de_place'];?></p>
                <?php $id_session =  $row2['id_session'];?>
                <?php
                $sql="SELECT * FROM formateurs WHERE id_formateur IN (SELECT id_formateur FROM sessions WHERE id_formation='$id_formation' AND id_session ='$id_session')";
                $results = mysqli_query($conn,$sql);
                
                
                while($rows = mysqli_fetch_assoc($results)){
                    ?>
                <p class="card-text">Formateur: <?php echo $rows['nom_formateur'];?><span>
                        <?php echo $rows['prenom_formateur'];?></span></p>

                <?php
                
                }
               
                
                ?>

                <input type="hidden" name="id_session" value="<?php echo $row2['id_session']; ?>">
                <input type="submit" class="btn mt-4 btn btn-success" name="submit" value="S'inscrire">
            </div>
        </div>
    </form>
    <?php
}
echo '</div>';
?>
 </div>
    </article>

    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>