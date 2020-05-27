<?php // Template Name: archive-research-template ?>

<?php get_header('page'); ?>

<!-- archive researches -->
<section class="section archive">
  <div class="container">
    <h1 class="section__title">Архив исследований</h1>

    <div class="archive__container archive__research box-shadow">

      <?php
        $args = array(
          'post_type' => 'research_post',
          'orderby'     => 'date',
          'order'       => 'DESC',
          'numberposts ' => -1
        );

        $posts = get_posts( $args );
        foreach( $posts as $post ) { 
          setup_postdata($post);

          $authors = get_field('authors');
          $resource_link = get_field('resource_link');
          $published = get_field('published');
      ?>

      <div class="archive__item">
        
        <div class="archive__preview">
          <h4 class="archive__title"><?php the_title(); ?></h4>
          <span class="archive__date"><?php the_date('d.m.Y'); ?></span>
        </div>

        <div class="archive__content">
          <div class="archive__wrapper">
            
            <div class="archive__block">
              <span class="archive__span archive__span-thin">Авторы:</span>
              <span class="archive__span"><?php echo $authors; ?></span>
            </div>

            <div class="archive__block">
              <span class="archive__span archive__span-thin">Опубликовано:</span>
              <span class="archive__span"><?php echo $published; ?></span>
            </div>

            <p class="archive__parag archive__research-parag">
              <?php $excerpt = get_the_excerpt(); echo $excerpt; ?>
            </p>
            
            <div class="archive__research-buttons">
              <a href="<?php the_permalink(); ?>" class="archive__btn archive__research-btn">Перейти к статье</a>
              <a href="<?php echo $resource_link; ?>" class="archive__btn archive__research-btn">Перейти к источнику</a>
            </div>

          </div>
        </div>
      
      </div>


      <?php 
        }
        wp_reset_postdata();
      ?>


    </div>
  </div>
</section>

<?php get_footer(); ?>