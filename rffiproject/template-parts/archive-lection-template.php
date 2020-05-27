<?php // Template Name: archive-lection-template ?>

<?php get_header('page'); ?>

<!-- archive lections -->
<section class="section archive">
  <div class="container">
    <h1 class="section__title">Архив материалов</h1>

    <div class="archive__container archive__lection box-shadow">

      <?php
        $args = array(
          'post_type' => 'lection_post',
          'orderby'     => 'date',
          'order'       => 'DESC',
          'numberposts ' => -1
        );

        $posts = get_posts( $args );

        foreach( $posts as $post ):
          setup_postdata($post);

          $file = get_field('file');
      ?>

      <div class="archive__item">
        
        <div class="archive__preview">
          <h4 class="archive__title"><?php the_title(); ?></h4>
          <span class="archive__date"><?php echo get_the_date('d.m.Y'); ?></span>
        </div>

        <div class="archive__content">
          <div class="archive__wrapper">
            <p class="archive__parag">
              <?php $excerpt = get_the_excerpt(); echo $excerpt; ?>
            </p>
            <?php if($file): ?><a href="<?php echo $file; ?>" class="archive__btn archive__lection-btn" download>Скачать файл</a><?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="archive__btn archive__lection-btn">Перейти к материалам</a>
          </div>
        </div>
      
      </div>

      <?php 
        endforeach;
        wp_reset_postdata();
      ?>

    
    </div>
  </div>
</section>

<?php get_footer(); ?>