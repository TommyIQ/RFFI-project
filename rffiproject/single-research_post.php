<?php
/* 
* Template Name: Single Research
* Template Post Type: research_post
*/

  get_header('page');

  $current_permalink = '';

  if( have_posts() ) :
    while(have_posts()) : 
      the_post();
      $resource_link = get_field('resource_link');
      $current_permalink = get_the_permalink();

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


          <div class="main__button">
            <a href="<?php echo $resource_link; ?>" class="main__button-left main__button-link">
              <span class="main__button-type">LINK</span>
              <span class="main__button-line"></span>
              
              <svg class="main__button-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="link" class="svg-inline--fa fa-link fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="#fff" d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"></path>
              </svg>
            </a>
            
            <span class="main__button-text">Научная статья</span>
          </div>


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