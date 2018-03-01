<?php require('bdd.php');
    session_start();
    require('head.php'); 
?>
<body>
    <div>
        <?php require('nav.php');?>
    </div>
  
    <section>
    <?php
    $resultat = mysqli_query($conn,"SELECT * FROM `blog`");
    if(!isset($_GET['page']))
    {
        $de = 0;
        $page = 0;
    }
    else
    {
        if($_GET['page'] > ((mysqli_num_rows($resultat))%5))
        {
            $page =(mysqli_num_rows($resultat))%5;
            $de = ($page)*5;
        }
         else{
            $page =$_GET['page'];
            $de = ($page)*5;
         }

    }
     $result = mysqli_query($conn,"SELECT * FROM `blog` ORDER BY 'date'LIMIT 5 OFFSET $de");
     while ($row = mysqli_fetch_assoc($result)) {
    ?>
           <div class="ticket">
            <?php
                echo '<div class="ticketImg"><img src="'.$row['image'].'"></div>';
                echo '<div  class="ticketText"><p>'.$row['date'].'</p>';
                echo '<p>'.$row['titre'].'</p>';
                echo '<p>'.$row['intro'].'</p>';
                echo '
                <form method="get" action="ticketBlog.php">
                <button name="id" value="'.$row['id'].'">Lire plus</button>
                </form>
                </div>
            </div>';
    }
    ?>
            
        </section>
        <?php
        if($de > 0)
        {
            echo'<a href="/blog.php?page='.($page-1).'" name="moins">Articles précédents</a >';
        }
        if($de < (mysqli_num_rows($resultat))-5)
        {
            echo'<a href="/blog.php?page='.($page+1).'"name="plus">Articles suivants</a>';

        }
        ?>
    
</body>
</html>