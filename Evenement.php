<?php 
    require('bdd.php');
    session_start();
    require('head.php'); 
?>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
 
        <section>
            <?php
             if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
             {
                 $res = mysqli_query($conn,"SELECT ville FROM `evenement`");
            ?>
                <div class="recherche">
                    <div class="search">
                    <form method="get" action="Evenement.php">
                        <input type="text" name="search" placeholder="Recherche">
                        <label for="for_title">uniquement dans le titre</label>
                        <input id="for_title"type="checkbox" name="title"> 
                        <button>Rechercher</button>

                    </form>
                    </div>
                    <div class="select">
                        <form method="get" action="Evenement.php">
                        <select name="choix" id="tri">
                        <option selected value="date" >Tri par Ville</option>
                    <?php
                        while ($rows = mysqli_fetch_array($res))
                        {
                                echo'<option value="'.$rows['ville'].'">'.$rows['ville'].'</option>';      
                        }
                    ?>
                        <input type="submit" value="Go">
                        </select>
                        </form>
                    </div>
                </div>
        <?php
            if(isset($_GET['choix']))
            {
                $choix =$_GET['choix'];


                if($choix =="date")
                {
                    $result = mysqli_query($conn,"SELECT titre,image,lieu,description,creation,date FROM `evenement` ORDER BY 'date'");
                }
                else
                {
                    $ville = $_GET['choix'];
                    $result = mysqli_query($conn,"SELECT titre,image,lieu,description,creation,date FROM `evenement` WHERE ville = '$ville' ORDER BY 'date'");
                }

            }
            else if (!isset($_GET['choix']))
            {
                if(isset($_GET['search']))
                {
                    $recherche = $_GET['search'];
                    if(isset($_GET['title']))
                    {
                        $result = mysqli_query($conn,"SELECT * FROM `evenement` WHERE titre LIKE '%".$recherche."%'");
                    }
                    else
                    {
                        $result = mysqli_query($conn,"SELECT * FROM `evenement` WHERE titre OR description LIKE '%".$recherche."%'");
                    }

                }
                else{
                    $result = mysqli_query($conn,"SELECT titre,image,lieu,description,creation,date FROM `evenement` WHERE date>=CURRENT_DATE ORDER BY 'date'");
                }

            }
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="ticket">
        <?php
            echo '<div class="ticketImg"><img src="'.$row['image'].'" width="150" height="150"></div>';
            echo '<div  class="ticketText"><p>Crée le '.$row['creation'].'</p>';
            echo '<p>'.$row['titre'].'</p>';
            echo '<p>'.$row['date'].'</p>';
            echo '<p>'.$row['lieu'].'</p>';
            echo '<p>'.$row['description'].'</p></div>';
        ?>
        </div>
        <?php
            }
        ?>
    </section>
<?php
}
else
{
    header('Location:/login.php');
}
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>   
</body>
</html>
<?php 
       
   