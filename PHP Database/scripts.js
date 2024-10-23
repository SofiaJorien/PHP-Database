document.addEventListener('DOMContentLoaded', function() {
    var teamSection = document.querySelector('.team-section');
    var featuresLink = document.getElementById('features');
    var toggleButtons = document.getElementById('toggle-buttons');
    
    featuresLink.addEventListener('click', function() {
        
        if (toggleButtons.style.display === 'none') {
            toggleButtons.style.display = 'flex';
        } else {
            toggleButtons.style.display = 'none';
        }
        
    });
    featuresLink.addEventListener('click', function() {
       
        if (toggleButtons.style.display === 'flex') {
            toggleButtons.style.display = 'none';
        } else {
            toggleButtons.style.display = 'flex';
        }
    });
});

// ITO YUNG SA DALAWANG BUTTON 

document.addEventListener('DOMContentLoaded', function() {
    // ITONG CODE FOR ALL FUNCTIONS BOTH HIDE AND SHOW
    function toggleVisibility(action) {
        const aboutItems = document.querySelectorAll('.about-item .description');
        const teamDetails = document.querySelectorAll('.team-member p');

        aboutItems.forEach(function(element) {
            element.style.display = action === 'show' ? 'block' : 'none';
        });

        teamDetails.forEach(function(element) {
            element.style.display = action === 'show' ? 'block' : 'none';
        });
    }

    // ITONG CODE IS FOR SHOW ALL DETAILS
    document.getElementById('show-button').addEventListener('click', function() {
        toggleVisibility('show');
    });

    // ITONG CODE IS FOR HIDING ALL DETAILS
    document.getElementById('hide-button').addEventListener('click', function() {
        toggleVisibility('hide');
    });
});


// NEW PAGE 


// DITO YUNG FUNCTION NG LOGIN AND REGISTRATION

document.addEventListener('DOMContentLoaded', function() {
    var aboutUsLink = document.getElementById('features');
    var toggleButtons = document.getElementById('toggle-buttons');
    var loginOverlay = document.getElementById('login-overlay');
    var registrationOverlay = document.getElementById('registration-overlay');

    var isLoggedIn = false; 

    // Show login overlay if not logged in
    if (!isLoggedIn) {
        loginOverlay.style.display = 'flex';
        registrationOverlay.style.display = 'none';
    } else {
        loginOverlay.style.display = 'none';
        registrationOverlay.style.display = 'none';
    }
    
    aboutUsLink.addEventListener('click', function() {
        if (toggleButtons.style.display === 'none' || toggleButtons.style.display === '') {
            toggleButtons.style.display = 'flex';
        } else {
            toggleButtons.style.display = 'none';
        } 
    });

    // ITO NAMAN YUNG SA CODE FOR HANDLING SUBMISSION DURING LOGIN 
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();
        loginOverlay.style.display = 'none';
        isLoggedIn = true;
    });

    // ITO NAMAN YUNG SA CODE FOR HANDLING SUBMISSION DURING REGISTRATION
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // ITO YUNG LOGIC FUNCTION FOR HIDE AND SHOW DISPLAY EITHER LOGIN OR REGISTRATION
        registrationOverlay.style.display = 'none';
        loginOverlay.style.display = 'flex';
    });

    // ITO YUNG CODE IF EVER THE USER ARE CLICK THE BUTTON OF LOGIN IN REGISTRATION THE LOGIN FORM WILL DISPLAY
    document.getElementById('show-registration').addEventListener('click', function() {
        loginOverlay.style.display = 'none';
        registrationOverlay.style.display = 'flex';
    });

    // ITO YUNG CODE IF EVER THE USER ARE CLICK THE BUTTON OF REGISTRATION IN LOGIN THE REGISTRATION FORM WILL DISPLAY
    document.getElementById('show-login').addEventListener('click', function() {
        registrationOverlay.style.display = 'none';
        loginOverlay.style.display = 'flex';
    });

    // THIS CODE IS FOR CLOSE ( BUT WE DECIDE TO HIDE IMMEDIATLY THE BUTTON FOR CLOSE)
    document.getElementById('close-login').addEventListener('click', function() {
        loginOverlay.style.display = 'none';
    });
});


// END OF THE LOGIN AND REGISTRATION 

function toggleDetails(action) {
    var elements = document.querySelectorAll('.team-member p');
    elements.forEach(function(element) {
        element.style.display = action === 'show' ? 'block' : 'none';
    });
}



document.addEventListener('DOMContentLoaded', function () {
    const navbarLinks = document.querySelectorAll('.navbar a[href^="#"]');

    navbarLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const homeSection = document.getElementById('team-container');
    const othersSection = document.getElementById('about');
    const contactsection = document.getElementById('contactss');
    const homeLink = document.getElementById('team');
    const aboutUsLink = document.getElementById('aboutlink');
    const contactlink = document.getElementById('contactlink');
    

    function showSection(sectionToShow) {


        if (sectionToShow === 'team-container') {
            homeSection.style.display = '';
            othersSection.style.display = 'none';
            contactsection.style.display = 'none';
        } else if (sectionToShow === 'about') {
            homeSection.style.display = 'none';
            othersSection.style.display = 'block';
            contactsection.style.display = 'none';
        }else if (sectionToShow === 'contactss') {
            homeSection.style.display = 'none';
            othersSection.style.display = 'none';
            contactsection.style.display = 'block';
        }
    }

    homeLink.addEventListener('click', function () {
        showSection('team-container');
    });

    aboutUsLink.addEventListener('click', function () {
        showSection('about');
    });
    contactlink.addEventListener('click', function () {
        showSection('contactss');
    });

    document.getElementById('logout-btn').addEventListener('click', function() {
        
        window.location.reload();
    });
    
    
    document.getElementById("login-overlay").addEventListener("submit", function(event) {
        event.preventDefault();  
    
        var username = document.getElementById("username").value;

      
        var welcomeMessage = document.getElementById("welcomeMessage");
        welcomeMessage.textContent = "Welcome, " + username + "!";
        welcomeMessage.style.display = "block";
    });


 //This function is for the registration to verify kung nakapag submit at na fill upon lahat ng information and the data input by user will recorded in Database
    $(document).ready(function() {
        $("form").on("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                type: "POST",
                url: "register_user.php",
                data: $(this).serialize(),
                success: function(response) {
                    alert(response); // Display the response message
                }
            });
        });
    });


});
