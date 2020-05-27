<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rffiproject
 */

?>

<?php get_header(); ?>


<!-- slider -->
<section class="slider">

  <div class="glide">
    <div class="glide__track" data-glide-el="track">
      <div class="glide__slides slider__slides">


        <div class="glide__slide slider__slide">
          <img class="slide__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/img.png" alt="img">

          <div class="container">
            <div class="slide__content">
              <p class="slide__parag">
                Каждая задача, которую я решал становилась правилом, служившим для решения других задач.
              </p>
              <span class="slide__author">Рене Декарт</span>

              <div class="slide__background"></div>
            </div>
          </div>

        </div>


        <div class="glide__slide slider__slide">
          <img class="slide__img" src="<?php echo get_template_directory_uri(); ?>/assets/img/img1.png" alt="img">

          <div class="container">
            <div class="slide__content">
              <p class="slide__parag">
                Каждая задача, которую я решал становилась правилом, служившим для решения других задач.
              </p>
              <span class="slide__author">Рене Декарт</span>

              <div class="slide__background"></div>
            </div>
          </div>

        </div>


      </div>
    </div>

    <div class="container">
      <div class="glide__bullets" data-glide-el="controls[nav]">
        <button class="glide__bullet" data-glide-dir="=0"></button>
        <button class="glide__bullet" data-glide-dir="=1"></button>
      </div>
    </div>

  </div>

</section>


<!-- about -->
<section class="section about" id="about">
  <div class="container">
    <h3 class="section__title">Чем мы занимаемся?</h3>
    <p class="section__parag">
      Такой текст также называется как заполнитель. Это очень удобный инструмент для моделей (макетов). Он помогает
      выделить визуальные элементы в документе или презентации, например текст, шрифт или разметка. Lorem ipsum по
      большей части является элементом латинского текста классического автора и философа Цицерона. Слова и буквы были
      заменены добавлением или сокращением элементов, поэтому будет совсем неразумно пытаться передать содержание; это
      не гениально, не правильно, используется даже не понятный латинский.
    </p>
  </div>
</section>


<!-- Researches -->
<section class="section research" id="research">
  <div class="container">
    <h3 class="section__title">Исследования</h3>
    <p class="section__parag">
      Lorem ipsum по большей части является элементом латинского текста классического автора и философа Цицерона.
      Слова и буквы были заменены добавлением или сокращением элементов, поэтому будет совсем неразумно пытаться
      передать содержание; это не гениально, не правильно, используется даже не понятный латинский.
    </p>

    <div class="research__content">

      <?php

      $args = array(
        'post_type' => 'research_post',
        'orderby'     => 'date',
        'order'       => 'DESC',
        'numberposts ' => 3
      );

      $posts = get_posts( $args );

      foreach( $posts as $post ) { 
        setup_postdata($post);

        $authors = get_field('authors');
        $resource_link = get_field('resource_link');
        $published = get_field('published');

      ?>

        <div class="research__card box-shadow">

          <div class="research__left">
            <?php the_post_thumbnail('post_thumbnail', array( 'class'  => 'research__img' )); ?>
          </div>

          <div class="research__right">
            <h4 class="research__title"><?php the_title(); ?></h4>

            <div class="research__block">
              <span class="research__span research__span-colored">Авторы:</span>
              <span class="research__span"><?php echo $authors; ?></span>
            </div>
            <div class="research__block">
              <span class="research__span research__span-colored">Опубликовано:</span>
              <span class="research__span"><?php echo $published; ?></span>
            </div>
            <div class="research__block">
              <span class="research__span research__span-colored">Дата:</span>
              <span class="research__span"><?php echo get_the_date('d.m.Y'); ?></span>
            </div>

            <div class="research__block">
              <span class="research__span research__span-colored">Постановка:</span>
              <p class="research__parag">
                <?php $excerpt = get_the_excerpt(); echo wp_trim_words($excerpt, 100, '...'); ?>
              </p>
            </div>

            <div class="research__links">
              <a href="<?php the_permalink(); ?>" class="research__link action-button">Перейти к статье</a>
              <a href="<?php echo $resource_link; ?>" class="research__link action-button">Перейти к источнику</a>
            </div>

          </div>
        </div>

      <?php
        }
        wp_reset_postdata();
      ?>


    </div>

    <div class="research__bottom">
      <a href="index.php/archive-research/" class="main-button">
        Посмотреть все
      </a>
    </div>

  </div>
</section>


<!-- Lections -->
<section class="section lection" id="lection">
  <div class="container">
    <h3 class="section__title">Лекции</h3>
    <p class="section__parag">
      Lorem ipsum по
      большей части является элементом латинского текста классического автора и философа Цицерона. Слова и буквы были
      заменены добавлением или сокращением элементов, поэтому будет совсем неразумно пытаться передать содержание; это
      не гениально, не правильно, используется даже не понятный латинский.
    </p>

    <div class="lection__content">
        
      <?php
        $args = array(
          'post_type' => 'lection_post',
          'orderby'     => 'date',
          'order'       => 'DESC',
          'numberposts ' => 6
        );

        $posts = get_posts( $args );

        foreach( $posts as $post ):
          setup_postdata($post);

          $file = get_field('file');
      ?>

        <div class="lection__card box-shadow">
          
          <h4 class="lection__title">
            <?php the_title(); ?>
          </h4>

          <div class="lection__block">
            <span class="lection__span lection__span-colored">Дата публикации:</span>
            <span class="lection__span"><?php echo get_the_date('d.m.Y'); ?></span>
          </div>

          <div class="lection__block">
            <span class="lection__span lection__span-colored">Краткая информация:</span>
            <p class="lection__parag">
              <?php $excerpt = get_the_excerpt(); echo wp_trim_words($excerpt, 100, '...'); ?>
            </p>
          </div>
        
          <div class="lection__links">
            <?php if($file): ?><a href="<?php echo $file; ?>" class="lection__link action-button" download>Скачать файл</a><?php endif; ?>
            <a href="<?php the_permalink(); ?>" class="lection__link action-button">Перейти к материалам</a>
          </div>

        </div>

      <?php 
        endforeach; 
        wp_reset_postdata();
      ?>

    </div>

    <div class="lection__btn">
      <a href="index.php/archive-lection/" class="main-button">
        Посмотреть все
      </a>
    </div>

  </div>
</section>


<!-- contributors -->
<section class="section contributors" id="contributors">
  <div class="container">
    <h3 class="section__title">Участники проекта</h3>

    <div class="contributors__content">

      <?php
        $args = array(
          'post_type' => 'member',
          'orderby'     => 'date',
          'order'       => 'DESC',
          'numberposts ' => -1
        );

        $posts = get_posts( $args );

        foreach( $posts as $post ):
          setup_postdata($post);

          $name = get_field('name');
          $role = get_field('role');
          $img_url = get_field('image');
      ?>

        <div class="contributors__member">
          <div class="contributors__member-content">
            <h5 class="contributors__member-name"><?php echo $name; ?></h5>
            <span class="contributors__member-position"><?php echo $role ?></span>
          </div>
          <img class="contributors__member-img" src="<?php echo $img_url; ?>" alt="Фотография участника проекта">
        </div>

      <?php
        endforeach;
        wp_reset_postdata();
      ?>

    </div>

  </div>
</section>


<?php get_footer(); ?>