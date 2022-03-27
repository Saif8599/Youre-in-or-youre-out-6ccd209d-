<?php
include_once('connection.php');

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Netland!</title>
      <style>
        .series {
        display: flex;
        flex-direction: row;
        }
        .rating {
        display: flex;
        justify-content: center;
        }
        .title {
        display: flex;
        justify-content: left;
        }
        .duur {
        display: flex;
        justify-content: center;
        }
        .desc {
        color: gray;
        font-style: italic;
        font-size: 12px;
        }
        .addserie {
        display: flex;
        flex-direction: row;
        }
        .addfilm {
        display: flex;
        flex-direction: row;
        }
        .addmedia {
            display: flex;
            flex-direction: row;
        }
      </style>
   </head>
   <body>
      <h1>Welkom op het netland beheerderspaneel</h1>
      <h3 class="addmedia"><a href="insert.php">Media toevoegen</a></h3>
      <h2>Series</h2>
      <div class="series">
         <div>
            <h3><a href="index.php?titleOrder=desc">Titel</a></h3>
            <div class="title">
            <?php
            if (isset($_GET["titleOrder"]) == null) {
                $stmt = $pdo->query('SELECT title FROM series');
                while ($row = $stmt->fetch()) {
                    echo $row['title'] . "<br>";
                }
            } elseif ($_GET["titleOrder"] == "desc") {
                $stmt = $pdo->query("SELECT title FROM series ORDER BY title DESC");
                while ($row = $stmt->fetch()) {
                    echo $row['title'] . "<br>";
                }
            };
            ?>
            </div>
         </div>
         <div class="rating">
            <div>
               <h3><a href="index.php?ratingOrder=desc">Rating</a></h3>
               <div class="rating">
                <?php
                if (isset($_GET["ratingOrder"]) == null) {
                    $stmt = $pdo->query('SELECT rating FROM series');
                    while ($row = $stmt->fetch()) {
                        echo $row['rating'] . "<br>";
                    }
                } elseif ($_GET["ratingOrder"] == "desc") {
                    $stmt = $pdo->query("SELECT rating FROM series ORDER BY rating DESC");
                    while ($row = $stmt->fetch()) {
                        echo $row['rating'] . "<br>";
                    }
                };
                ?>
               </div>
            </div>
            <div>
               <br><br><br>
               <div class="rating" style="flex-direction: column !important;">
                <?php
                $stmt = $pdo->query('SELECT * FROM series ORDER BY id');
                while ($row = $stmt->fetch()) {
                    ?>
                  <a href="series.php?id=<?php echo $row['id'] ?>">Bekijk details</a>
                <?php }
                ?>
                </div>
            </div>
            <h3 class="addserie"><a href="add_serie.php">Add Serie</a></h3>
         </div>
      </div>
        <?php
        if (isset($_GET["ratingOrder"]) == "desc") {
            echo "<a class='desc'>Active sorting: Rating</a>";
        }
        if (isset($_GET["titleOrder"]) == "desc") {
            echo "<a class='desc'>Active sorting: Titel</a>";
        };
        ?>
      <h2>Films</h2>
      <div class="series">
         <div>
            <h3><a href="index.php?titleOrder1=desc">Titel</a></h3>
            <div class="title">
            <?php
            if (isset($_GET["titleOrder1"]) == null) {
                $stmt = $pdo->query('SELECT title FROM movies');
                while ($row = $stmt->fetch()) {
                    echo $row['title'] . "<br>";
                }
            } elseif ($_GET["titleOrder1"] == "desc") {
                $stmt = $pdo->query("SELECT title FROM movies ORDER BY title DESC");
                while ($row = $stmt->fetch()) {
                    echo $row['title'] . "<br>";
                }
            };
            ?>
            </div>
         </div>
         <div>
            <h3><a href="index.php?length_in_minutesOrder=desc">Duur</a></h3>
            <div class="duur">
            <?php
            if (isset($_GET["length_in_minutesOrder"]) == null) {
                $stmt = $pdo->query('SELECT length_in_minutes FROM movies');
                while ($row = $stmt->fetch()) {
                    echo $row['length_in_minutes'] . "<br>";
                }
            } elseif ($_GET["length_in_minutesOrder"] == "desc") {
                $stmt = $pdo->query("SELECT length_in_minutes FROM movies ORDER BY length_in_minutes DESC");
                while ($row = $stmt->fetch()) {
                    echo $row['length_in_minutes'] . "<br>";
                }
            };
            ?>
            </div>
         </div>
         <div>
            <br><br><br>
            <div class="rating" style="flex-direction: column !important;">
            <?php
                $stmt = $pdo->query('SELECT * FROM movies ORDER BY id');
            while ($row = $stmt->fetch()) {
                ?>
               <a href="films.php?id=<?php echo $row['id'] ?>">Bekijk details</a>
            <?php }
            ?>
            </div>
         </div>
         <h3 class="addfilm"><a href="add_film.php">Add Film</a></h3>
      </div>
      </div>
        <?php
        if (isset($_GET["titleOrder1"]) == "desc") {
            echo "<a class='desc'>Active sorting: Titel</a>";
        };
        if (isset($_GET["length_in_minutesOrder"]) == "desc") {
            echo "<a class='desc'>Active sorting: Duur</a>";
        };
        ?>
        <br><a href="logout.php">Logout</a>
   </body>
</html>

