<!DOCTYPE html>
<html lang="en">


<body>
    <header class="sx-header">
        <div class="sx-container sx-header-inner">
            <a href="index.html" class="sx-logo">
                <span class="sx-logo-mark">SX</span>
                <span class="sx-logo-text">StreamX24</span>
            </a>
            <button class="sx-nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
            </button>
            <!-- <nav class="sx-nav">
                <a href="index.html" class="active">Home</a>
                <a href="about.html">About</a>
                <a href="contact.html">Contact</a>
                <a href="privacy.html">Privacy</a> 
                <a href="terms.html">Terms</a>
            </nav> --> 
 <nav class="sx-nav">
 <?php
          wp_nav_menu(array(
            'theme_location' => 'Header-Menu',
            'menu_class' => 'navv',
          ));
        ?>
    </nav>
        </div>
    </header>