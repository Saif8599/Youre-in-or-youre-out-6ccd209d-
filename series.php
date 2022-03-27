<?php
    include_once('connection.php')
?>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Netland! Series</title>
      <style>
         h2 {
         display: flex;
         flex-direction: row;
         }
      </style>
   </head>
   <body>
    <a href="index.php">Terug</a>
        <h1>
        <form method="POST" action="edit_serie.php">
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "<input type='hidden' name='id' value='" . $_GET[ "id" ] . "'>";
            echo $row['title'] . " - " . $row['rating'];
        }
        ?>
    </h1>
    <h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Title : ";
            echo "<input type='text' name='title' value='" . $row['title'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Rating : ";
            echo "<input type='text' name='rating' value='" . $row['rating'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Awards : ";
            echo "<input type='text' name='has_won_awards' value='" . $row['has_won_awards'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Seasons: ";
            echo "<input type='text' name='seasons' value='" . $row['seasons'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
            $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Country: ";
            echo "<input type='text' name='country' value='" . $row['country'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
        $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
            echo "Language: ";
            echo "<input type='text' name='spoken_in_language' value='" . $row['spoken_in_language'] . "'>";
        }
        ?>
    </h2>
    <h2>
        <?php
        $stmt = $pdo->query("SELECT * FROM `series` WHERE `id`='" . $_GET[ "id" ] . "'");
        while ($row = $stmt->fetch()) {
                echo "Omschrijving : ";
                echo "<Textarea rows='10' cols='80' name='summary'>" . $row['summary'] . "</textarea>";
        }
        ?>
    </h2>
    <?php
    if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $rating = $_POST['rating'];
            $omschrijving = $_POST['summary'];
            $awards = $_POST['has_won_awards'];
            $seizoen = $_POST['seasons'];
            $land = $_POST['country'];
            $taal = $_POST['spoken_in_language'];
        if (empty([$title, $rating, $omschrijving, $awards, $seizoen, $land, $taal])) {
            $stmt = $pdo->query("UPDATE `series` SET title='', rating='', summary='', has_won_awards='', seasons='', country='', spoken_in_language=''
               WHERE `id`='" . $_GET[ "id" ] . " '");
               echo "Data failed to update";
        } else {
            $stmt = $pdo->query("UPDATE `series` SET title='$title', rating='$rating', has_won_awards='$awards', seasons='$seizoen', country='$land',
            WHERE `id`='" . $_GET[ "id" ] . " '");
            $stmt = $pdo->query("UPDATE `series` SET summary='$omschrijving', spoken_in_language='$taal'  WHERE `id`='" . $_GET[ "id" ] . " '");
               echo "Data updated";
        }
    }
    ?>
    <input type="submit" name="sumbit" value="Wijzig">
    </form>
   </body>
</html>