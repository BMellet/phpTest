<nav>
    <ul>
        <li><a href="/index.php">Home</a></li>
        <li><a  href="/apropos.php">A propos</a></li>
        <li><a  href="/Evenement.php">Evenements</a></li>
        <li><a  href="/blog.php">Blog</a></li>
        <li><a  href="/contact.php">Contact</a></li>
        <?php
        if(!isset($_SESSION['pseudo']))
        {
            echo '<li><a  href="/login.php">Login</a></li>';
        }
        if(isset($_SESSION['pseudo']))
        {
            echo '<li><a  href="/logout.php">Logout</a></li>';
        }
        if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
        {
            echo '<li class="name">Bonjour ' . $_SESSION['pseudo'].'</li>';
        }
        ?>
    </ul>
</nav>
        <?php
        $adresse = $_SERVER['PHP_SELF'];
        $rest = substr($adresse,1,-4);
        if($rest === "index")
        {
            echo '<h1> home </h1>';
        }
        else
        {
            echo '<h1>'.$rest.'</h1>';
        }
        ?>