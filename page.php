<?php 
    get_header();
    the_post();
?>

<div class="sx-container">

    <?php 
    the_title('<h1 class="sx-page-title">', '</h1>');
 echo the_content();
 ?>
 </div>

<?php 
    get_footer();
?>
