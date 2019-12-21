<?php get_header(); ?>

<div class="container">

    <?php
if ( have_posts() ) {
  while ( have_posts() ) {
    /*
     * La méthode the_post() permet de charger le post courant
     * Un post est un type de contenu, par exemple une actualité ou une page
     **/
    the_post(); 
    /**
     * La méthode the_content() affiche le contenu du post en cours
     * Il s'agit du contenu que vous avez renseigné dans le back-office
     * Il existe d'autres méthodes, par exemple pour afficher le Titre du contenu, on peut utiliser la méthode the_title()
     */
    /*the_content();*/
	  
	  $banner_img = get_field('banner_background_image');
	  $banner_lien = get_field('banner_register_link');
      $conference_img = get_field('conference_img');
      $program_img = get_field('program_image');
	  $program_lien = get_field('program_register_link');
      $orateur_img = get_field('orateur_image');
      $orateur_lien = get_field('orateur_link');

?>
    <!-- CODE HTML-->
    <section class="section-1" style="background-image:url(<?php echo $banner_img['url']; ?>)">
        <div>
            <p class="section-title"><?php the_field('banner_baseline'); ?></p>
            <h2 class="section-txt1"><?php the_field('banner_title_brown'); ?></h2>
            <h2 class="section-txt2"><?php the_field('banner_title_green'); ?></h2>
            <a href="<?php echo $banner_lien['url']; ?>" class="inscription-button"><?php echo $banner_lien['title']; ?></a>
        </div>
    </section>

    <section class="section-2">
        <div>
            <h2 class="section-txt1" id="letter-spacing"><?php the_field('conference_title'); ?></h2>
            <p class="section-title" id="section2txt"> <?php the_field('conference_content'); ?></p>
        </div>
    </section>

    <section class="section-3" style="background-image:url(<?php echo $conference_img['url']; ?>)">
    </section>

    <section class="section-4">
        <h2 class="section-txt1" id="letter-spacing"><?php the_field('programme_title'); ?></h2>
        <div class="section-4-programme">
            <div class="section-4-leftpart">
                <h4 class="green-title"><?php the_field('programme_subtitle1'); ?></h4>
                <?php 
                    $programs = get_field('program_repeater');
                    if ($programs) {
                        echo"<ul>";
                        foreach($programs as $program) {
                            echo '<li> <b>' . $program['hour'] . '</b>' . $program['description'] . '</li>' ;
                        }
                        echo "</ul>";
                    }         
                    ?>
            </div>

            <div class="section-4-rightpart">
                <h4 class="green-title"><?php the_field('programme_subtitle2'); ?></h4><br>
                <?php 
                    $programs_2 = get_field('program_repeater_2');
                    if ($programs_2) {
                        echo"<ul>";
                        foreach($programs_2 as $program) {
                            echo '<li> <b>' . $program['hour_2'] . '</b>' . $program['description_2'] . '</li>' ;
                        }
                        echo "</ul>";
                    }         
                    ?>
            </div>
        </div>
        <div class="plus">
            <a href="<?php echo $program_lien['url']; ?>" class="inscription-button"><?php echo $program_lien['title']; ?></a>
            <img id="img-programme" src="<?php echo $program_img['url']; ?>" alt="image programme">
        </div>

    </section>

    <section class="section-5">
        <div>
            <p class="section-txt1" id="letter-spacing"><?php the_field('orateur_title'); ?></p>
            <h2 id="section2txt"><?php the_field('orateur_sub_title'); ?></h2>
          
        </div>
    </section>




    <section>
        <?php $news = new WP_Query( array('post_type' => 'post'));
      
      
		while($news->have_posts()){
		$news->the_post();
			echo get_the_title();
      
       
        ?>

    </section>
    




    <?php } } ?>


<?php get_footer(); ?>
