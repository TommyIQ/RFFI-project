<?php
/* 
* Template Name: Single Lection
* Template Post Type: lection_post
*/

  get_header('page');

  $current_permalink = '';

  if( have_posts() ) :
    while(have_posts()) : 
      the_post();
      $file = get_field('file');
      $current_permalink = get_the_permalink();
      echo $file; echo gettype($file);
?>

<!-- main -->
<section class="section main">
  <div class="container">
    <div class="main__content">

      <h1 class="section__title"><?php the_title(); ?></h1>

      <?php the_content(); ?>
      
      <div class="main__additional">
        <h3 class="main__subtitle">Дополнительные материалы</h3>
        <div class="main__materials">

          <?php if($file) { ?>
            <div class="main__button">
              <a href="<?php echo $file; ?>" class="main__button-left main__button-pdf" download>
                <span class="main__button-type">PDF</span>
                <span class="main__button-line"></span>
                
                <svg class="main__button-icon" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-alt" class="svg-inline--fa fa-file-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                  <path fill="#fff" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"></path>
                </svg>
              </a>
              
              <span class="main__button-text">Полная лекция</span>
            </div>
          <?php } 
            else { ?>
            <p id="main__materials-parag" class="main__materials-parag">Извините, файлы отсутствуют</p>
          <?php } ?>

        </div>
      </div>

    </div>

  </div>
</section>

<?php
    endwhile;
  endif;
?>


<section class="pagination section">
  <div class="container">

    <?php 
      $next_post_link_url = get_permalink( get_adjacent_post(false,'',false)->ID ); 
      $prev_post_link_url = get_permalink( get_adjacent_post(false,'',true)->ID );
    ?>

    <div class="pagination__controls">

      <div class="pagination__item <?php echo ($current_permalink === $prev_post_link_url) ? 'pagination__item-disabled' : ''; ?>">
        <span class="pagination__text">Предыдущая</span>
        <a href="<?php echo $prev_post_link_url; ?>" 
        class="pagination__icon pagination__icon-prev <?php echo ($current_permalink === $prev_post_link_url) ? 'pagination__icon-disabled' : ''; ?>">

          <svg class="pagination__chevron" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" class="svg-inline--fa fa-chevron-left fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path fill="#fff" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
          </svg>

        </a>
      </div>

      <div class="pagination__item <?php echo ($current_permalink === $next_post_link_url) ? 'pagination__item-disabled' : ''; ?>">
        <a href="<?php echo $next_post_link_url; ?>" 
        class="pagination__icon pagination__icon-next <?php echo ($current_permalink === $next_post_link_url) ? 'pagination__icon-disabled' : ''; ?>">

          <svg class="pagination__chevron" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" class="svg-inline--fa fa-chevron-right fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
            <path fill="#fff" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
          </svg>

        </a>
        <span class="pagination__text">Следующая</span>
      </div>


    </div>
  </div>
</section>


<?php get_footer(); ?>