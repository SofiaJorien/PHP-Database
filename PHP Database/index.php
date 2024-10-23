
<?php
ob_start();

session_start();

// Set a cookie for the username if it is not already set
if (isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    setcookie('username', $_SESSION['username'], time() + (86400 * 30), "/"); // 86400 = 1 day, cookie lasts 30 days
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Mitr' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&family=Matemasie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Wellcome to Our Webpage Exercise#4</title>
    <style>
        #toggle-buttons {
            display: none; 
        }
    </style>

<header>
 
    <h7><b>Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></b></h7>
</header>


</head>
<nav class="navbar" id="navbar">
        <a href="#team-container" id="team"><b>Home</b></a>
        <a href="#about" id="aboutlink"><b>About Us</b></a>
        <a href="#contactss" id="contactlink"><b>Contact</b></a>
        <a href="#" id="features"><b>Features</b></a>
        <a href="info.php"><b>Account Info</b></a>
    </nav>

     
    <div class="team-sectio" id="team-sectio">
        <h1><b>Integrative Programming & Technologies 1</b></h1>
        <h2><b>Meet Our Team Grp 7</b></h2>
        <div id="toggle-buttons" class="toggle-buttons">
            <button id="show-button"><b>SHOW</b></button>
            <button id="hide-button"><b>HIDE</b></button>
            <form action="login.php" method="get">
            <button id="logout-btn"><b>Logout</b></button>
            </form>
            
        </div>
            </div>
        
       

            <div class="team-section">
    <div class="team-container" id="team-container">
        <?php
        $teamMembers = [
            [
                'img' => 'J1.jpg',
                'name' => 'Junjell Sayson',
                'role' => 'Project Leader',
                'age' => 20,
                'hobby' => 'Sports/Games',
                'zodiac' => 'Aquarius'
            ],
            [
                'img' => 'D1.jpg',
                'name' => 'Danieca Aseniero',
                'role' => 'Web Analyst',
                'age' => 20,
                'hobby' => 'Sing',
                'zodiac' => 'Sagittarius'
            ],
            [
                'img' => 'K1.jpg',
                'name' => 'Kier Brinner Alvarez',
                'role' => 'Lead Programmer',
                'age' => 22,
                'hobby' => 'Gamer',
                'zodiac' => 'Leo'
            ],
            [
                'img' => 'S!.jpg',
                'name' => 'Sofia Jorien Arbolado',
                'role' => 'Web Designer',
                'age' => 19,
                'hobby' => 'Editing',
                'zodiac' => 'Sagittarius'
            ],
            [
                'img' => 'W2.png',
                'name' => 'William Xavier Ricaza',
                'role' => 'Lead Programmer',
                'age' => 20,
                'hobby' => 'Judo',
                'zodiac' => 'Gemini'
            ],
            [
                'img' => 'C1.png',
                'name' => 'Chuck Harison Garganta',
                'role' => 'Database Developer',
                'age' => 21,
                'hobby' => 'Sports',
                'zodiac' => 'Aries'
            ]
        ];

        foreach ($teamMembers as $member) {
            // this code will be sanitize at ma validate yung data from age
            $age = filter_var($member['age'], FILTER_VALIDATE_INT);
            $zodiac = filter_var($member['zodiac'], FILTER_SANITIZE_STRING);

            // This code will check if yung Age is Valid in Integer
            if ($age === false) {
                $age = 'N/A'; // or set a default value
            }

            echo '<div class="team-member">';
            echo '<img src="' . htmlspecialchars($member['img']) . '" alt="Team Member">';
            echo '<h3><i>' . htmlspecialchars($member['name']) . '</i></h3>';
            echo '<p>' . htmlspecialchars($member['role']) . '</p>';
            echo '<p>Age: ' . $age . '</p>';
            echo '<p>Hobby: ' . htmlspecialchars($member['hobby']) . '</p>';
            echo '<p>Zodiac Sign: ' . $zodiac . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</div>




     <section class="about" id="about">
<div class="heading">
    <h2>ABOUT US</h2>
</div>
<div class="about-container">
    <?php
    $teamMembers = [
        [
            'img' => 'J1.jpg',
            'name' => 'Junjell Sayson',
            'description' => 'Whether you’re looking for inspiration, motivation, comfort, or a good chuckle, these snippets of wisdom are perfect for jotting down in your journal or posting on social media. Here are 151 quotes about life that will make you pause and reflect. '
        ],
        [
            'img' => 'D1.jpg',
            'name' => 'Danieca Aseniero',
            'description' => 'You can call me Yca for short. I really love taking pictures and videos. And then I also enjoy editing it to make it even better or presentable. Other than that, I love dancing and especially singing. I also watch romance and comedy kdramas, I don\'t really like horror movies because they scare me too much. For my appearance, I like putting on make up and wearing nice clothes because that\'s where I show my confidence, not to be praised by others.'
        ],
        [
            'img' => 'K1.jpg',
            'name' => 'Kier Brinner Alvarez',
            'description' => 'Just call me kir. I am the eldest brother, currently live in Bf homes Parañaque at my grandmother (the cousin of my grandmother in my father side). I am a friendly person, talkative and happy person. My hobbies are playing online games, watching scary movies, laying down all the time, gardening, walking and many more. My favorite food is tinolang sitaw and spicy beef marrow stew. I am a college student, I\'m not good at coding but I\'ll try my best to understand it.'
        ],
        [
            'img' => 'S!.jpg',
            'name' => 'Sofia Jorien Arbolado',
            'description' => 'I\'ve  You can call me Pia and my other hobbies are watching movies, series and reading books. The skills that I think I excel is editing photos and videos and I think it will help me enhance my skill and its also have an connection in my course. And to express myself through makeup and dressing up.'
        ],
        [
            'img' => 'W1.jpg',
            'name' => 'William Xavier Ricaza',
            'description' => 'My other hobbies are watching movies, anime and reading manga/manhwa. The skills that I\'m most confident with are doing various types of sports and skills that are related to my course. I\'m good at reading problems and coding in C++ and CSS.'
        ],
        [
            'img' => 'C1.png',
            'name' => 'Chuck Harison Garganta',
            'description' => 'I\'d like to play basketball and play online games. I\'m a shy person but friendly and kind. I\'m a college student, slow to understand but still trying to learn.'
        ]
    ];

    foreach ($teamMembers as $index => $member) {
        echo '<div class="about-item">';
        echo '<div class="about-image">';
        echo '<img src="' . $member['img'] . '" alt="">';
        echo '</div>';
        echo '<div class="about-info">';
        echo '<h2><b>"' . $member['name'] . '"</b></h2>';
        echo '<p class="description">' . $member['description'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>



</div>
</section>
    

  <section class="contactss" id="contactss">
  <div  class="heading"">
 <h2>OUR TEAM CONTACTS</h2>
</div>
<div class="contact-container">
    <div class="contact-item">
        <div class="contact-image">
            <img src="J2.png" alt="">
        </div>
        <a href="https://github.com/Jelyyshhh" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3">
        </a>
        <a href="https://www.linkedin.com/in/junjell-sayson-28a934322/" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
        <a href="https://www.udemy.com/user/junjell-sayson/" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        <div class="contact-info">
           <h2>------------</h2>
          <p>------------</p>
        </div>
    </div>

    <div class="contact-item">
        <div class="contact-image">
            <img src="D2.jpg" alt="">
        </div>
        <a href="https://github.com/AsenieroDanieca?fbclid=IwZXh0bgNhZW0CMTEAAR0WpGq5m0kPGObn0BqDPj7rCFmIT8r_PqFroIbnhuh3AgEK7y2q81ri5XM_aem__pbGmazcbjJx9bNbb0Rd7g" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3">
        </a>
        <a href="https://www.linkedin.com/in/danieca-aseniero-08012a323/?fbclid=IwZXh0bgNhZW0CMTEAAR2NQzkbF5-vxvxTAsngSZ2kN7Ju7TLmNN6bWBlgd_E6F_konQ8oI59gAGA_aem_9_TZ97Odo_kJCyTRngc09A" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
        <a href="https://www.udemy.com/user/danieca-aseniero/?fbclid=IwZXh0bgNhZW0CMTEAAR1yvB7WnOd4TAO9Prp3NmtshDEZewf4vPi2scwXknMEgD28p7CTsnG6MUA_aem_75o8EP84JRVU1t-G06-D7w" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        <div class="contact-info">
           <h2>------------</h2>
           <p>------------</p>
        </div>
    </div>

    <div class="contact-item">
        <div class="contact-image">
            <img src="K2.png" alt="">
        </div>
        <a href="https://github.com/AlvarezKier?fbclid=IwZXh0bgNhZW0CMTEAAR2-z8yQ1sOgjRiPe1m0bY1M-i4R8gin2HfAzk1kvBDEVSng_ZQqCIRtJZc_aem_yFk_-SThMHMCeNgmk6Wb0w" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3">
        </a>
        <a href="https://www.linkedin.com/in/kier-brinner-c-alvarez-2064bb271/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app&fbclid=IwZXh0bgNhZW0CMTEAAR1s4-xdMAPi9NDbI19NVmIJWdYKZPMtfuxk5ZyuRgzpOVqJAQnw1VZxtMY_aem_A27DCeIC58-OrVBVfE1Umw" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
        <a href="https://www.udemy.com/user/kier-brinner-c-alvarez/?fbclid=IwZXh0bgNhZW0CMTEAAR2THokS5-OiKat1xCNbFPhoXXbx4imU1623GPbfmTOIUxylM_dppM3KffY_aem_SfU3EBsh5tr7TpUBkNH5hw" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        <div class="contact-info">
           <h2>------------</h2>
           <p>------------</p>
        </div>
    </div>

    <div class="contact-item">
        <div class="contact-image">
            <img src="S2.jpg" alt="">
        </div>
        <a href="https://github.com/SofiaJorien?fbclid=IwZXh0bgNhZW0CMTEAAR0CcIV2eL_JH27MnbtQChO5GmN8hDk11eZd_n8Vo3qQhLDxReZ85aGUxLM_aem_wcOBxfG9zgtMM07TO7IcSw" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3">
        </a>
        <a href="https://ph.linkedin.com/in/sofia-jorien-arbolado-b2212a323?fbclid=IwZXh0bgNhZW0CMTEAAR340WVflX_LVkIkmWvnR3lTZQg3RLE_sPQFFKuI1kMY8Pb7SNghPdIzkPo_aem_JbCr1lf_iX0LTJIcNOfG5Q" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
        <a href="https://www.udemy.com/user/sofia-arbolado/?fbclid=IwZXh0bgNhZW0CMTEAAR3i-Sc10kdguKD6XC5yXw9ym4t_SdD4Xyh4sHFmx-YeY3iW_kfy4lMaASE_aem_qOxtjCNKw5ZhZgQ6i7f57g" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        <div class="contact-info">
           <h2>------------</h2>
           <p>------------</p>
        </div>
    </div>

    <div class="contact-item">
        <div class="contact-image">
            <img src="W1.jpg" alt="">
        </div>
        <a href="https://github.com/Ricazaa?fbclid=IwZXh0bgNhZW0CMTEAAR1to1Tv2BpTsDA5HLBE6PcJ0Wz89KswaLApsBxuOg2YfPowyGOtDr4lyWM_aem_YAZb_ZkbcXVU40AtTTTnuw" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3">
        </a>
        <a href="https://www.linkedin.com/in/william-xavier-ricaza-575704322/?fbclid=IwZXh0bgNhZW0CMTEAAR2b5EDrWelF_RLcj4AH-71-7rOX3NZa7hSkv1nSP7ffoSXUDQLgs-ML2_Q_aem_lnWTxfztxXuwVpaMq5sWIA" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
        <a href="https://www.udemy.com/user/william-ricaza/?fbclid=IwZXh0bgNhZW0CMTEAAR13LtabFbK0O4hokjq1rU77OBr8-7Y7nrRaHNBaV5il4jJ8WV58HqCTVK8_aem_1PGo1a0jhgsmk8sahahH4w" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        <div class="contact-info">
           <h2>------------</h2>
           <p>------------</p>
        </div>
    </div>

    <div class="contact-item">
        <div class="contact-image">
            <img src="C3.png" alt="">
        </div>
        <a href="https://github.com/Gargantachuck?fbclid=IwZXh0bgNhZW0CMTEAAR25UhybwHVaGgKPVxIePKjCN-VucXZ6nKXeYikH9SChrcgZEctFv5H5fMs_aem_Tv9bYEVOFT9SNhDAoHjpLQ" class="contact-imagess">
            <img src="GIT.jpg" alt="Contact 3"> 
            <a href="https://www.linkedin.com/in/chuck-harison-garganta-205709322/?fbclid=IwZXh0bgNhZW0CMTEAAR3wZv4fDUCTNP2DvX3VihjPtxIP4XimLPC4yuUNGc6zFgnlSj7NxtU8f1c_aem_o2RVgASmWlRKTq2O_kW5Ig" class="contact-imagess"> <img src="LN.jpg" alt="Contact 3"> </a>
            <a href="https://www.coursera.org/user/cf995358db5017bf0d08651e6dc279b6?fbclid=IwZXh0bgNhZW0CMTEAAR3uwuTcpWIrIBawwwaQ32oimsJxkfiC19OI1S7eM7cNoQydP4iZBMIGQQw_aem_1UxtUHJSzFjBxWBAaxDMfg" class="contact-imagess"> <img src="UD.jpg" alt="Contact 3"> </a>
        </a>

        <div class="contact-info">
           <h2>------------</h2>
           <p>------------</p>
        </div>
    </div>

</div>
</section>
<div id="registration-overlay" </div>
    <script src="scripts.js"></script>

    <footer style="text-align: center; font-size: 2em;">
    <p><b>All Rights Reserved 2024</b></p>
    <p><b>Created By:<b> <a href="https://plmun.edu.ph/#:~:text=The%20Pamantasan%20ng%20Lungsod%20ng%20Muntinlupa%20is%20ISO%209001:2008%20CERTIFIED" target="_blank">IT3M Grp7</a></p>
</footer>



</body>
</html>


<?php
ob_end_flush();
?>

