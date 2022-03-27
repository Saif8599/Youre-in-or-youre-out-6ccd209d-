<?php
    include_once('connection.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD MEDIA</title>
    <style>
        .form {
        display: flex;
        flex-direction: row;
        }
      </style>
</head>
<body>
<a href="index.php">Terug</a>
<form method="POST" action="insert.php">
    <h1>Media toevoegen</h1>
    <div class="form">
    <h2>
    <?php
            echo "Titel : <br><input type='text' name='titel'><br>";
            echo "Rating : <br><input type='text' name='rating'><br>";
            echo "Samenvatting : <br><Textarea rows='10' cols='40' name='samenvatting'></textarea><br>";
            echo "Aantal awards : <br><input type='text' name='awards'><br>";
            echo "Releasedatum (dd - mm - jjjj) : <br><input type='date' name='Aantal_awards'><br>";
            echo "<br>Seizoenen : <br><input type='text' name='seizoenen'><br>";
            echo "land : <br><input type='text' name='land'><br>";
            echo "Taal : <br><input type='text' name='taal'><br>";
            echo "YT trailer ID : <br><input type='text' name='YT_trailer_ID'><br>";
            echo "Type media : <select name='Type_media'> <option value='Film'>Film</option>
            <option value='Serie'>Serie</option></select><br>";
            echo "<input type='submit' name='submit' value='Toevoegen'>";
    ?>
    </h2>
    <h2>
        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $rating = $_POST['rating'];
            $omschrijving = $_POST['summary'];
            $awards = $_POST['has_won_awards'];
            $seizoen = $_POST['seasons'];
            $land = $_POST['country'];
            $taal = $_POST['spoken_in_language'];
            $youtubeId = $_POST['youtube_trailer_id'];
        }
        ?>
    </h2>
    <h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $rating = $_POST['rating'];
            $omschrijving = $_POST['summary'];
            $awards = $_POST['has_won_awards'];
            $seizoen = $_POST['seasons'];
            $land = $_POST['country'];
            $taal = $_POST['spoken_in_language'];
            $youtubeId = $_POST['youtube_trailer_id'];
        if (empty($title) || empty($rating) || empty($omschrijving) || empty($awards) || empty($seizoen) || empty($land) || empty($taal) || empty($youtubeId)) {
            $status = "Vul de lege velden";
        } else {
            $status = "Data verstuurd";
        }
            $sql = "INSERT INTO movies (title, rating, summary, has_won_awards, seasons, country, spoken_in_language)
            VALUES (:titel, :rating, :omschrijving, :awards, :seizoen :land :taal)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['titel' => $title, 'rating' => $rating, 'omschrijving' => $omschrijving,
         'has_won_awards' => $awards, 'seasons' => $seizoen, 'country' => $land, 'spoken_in_language' => $taal]);
    }
    ?>
    </h2>
</div>
</form>
</body>
</html>