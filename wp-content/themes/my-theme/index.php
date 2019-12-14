<?php get_header(); ?>

<div class="container">

<?php
if ( have_posts() ) {
  while ( have_posts() ) {
    /**
     * La méthode the_post() permet de charger le post courant
     * Un post est un type de contenu, par exemple une actualité ou une page
     **/
    the_post(); 

    /**
     * La méthode the_content() affiche le contenu du post en cours
     * Il s'agit du contenu que vous avez renseigné dans le back-office
     * Il existe d'autres méthodes, par exemple pour afficher le Titre du contenu, on peut utiliser la méthode the_title()
     */
    the_content();
    
    $banner_img= get_field("banner_background_image");
    $conf_band= get_field("conference_bandeau_brackground_image");
    $banner_register_link= get_field("banner_register_link");
?>
    <section class='section-1' style=" background-image:url(<?php echo $banner_img['url'];?>) ">
        <p class='section-title1'> <?php the_field('banner_baseline'); ?> </p>
        <p id='section-title2'>  <?php the_field('banner_title_brown'); ?></p>
        <p id='section-title3'> <?php the_field('banner_title_green'); ?></p>
    
        <div>
            <a href='<?php echo $banner_register_link['url'];?>'id='bouton' ><?php echo $banner_register_link['title'];?></a>
            </div>
    </section>
    
    <section class='section-2'>
        <p id='section-title_sec2'> <?php the_field('conference_title'); ?> </p>
        <p class="section-text"><?php the_field('conference_content'); ?>
        </p>
    </section>
    
    <section class='section-3' style=" background-image:url(<?php echo $conf_band['url'];?>) ">
        
    </section>
<?php
  }
}
?>

</div>

<?php get_footer(); ?>