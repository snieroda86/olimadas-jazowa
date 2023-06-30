<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package web14devsn
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
        <div class="post-thumbnail-single">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('full' , ['class'=> 'img-fluid']);
            } ?>        
        </div>  
        <div class="secnd-meta-row d-flex flex-wrap pt-3 justify-content-end">
             <?php if(get_post_type() =='post'): ?>
                <div class="postmeta-item-sn">
                   <span class="postmeta-text post-categories-sn">
                        <?php 
                         getPostCats(get_the_ID());
                         ?>
                   </span>
                </div>
               
                <div class="separator-ver ">|</div>
            <?php endif; ?>
            <!-- Share mobile for press note -->
            <?php if(get_post_type() =='notatki_prasowe'): ?>
                <div class="postmeta-item-sn mr-auto share-area-mobile">
                    <div class="share-area-mobile">
                         <?php echo do_shortcode('[addtoany]'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Item -->
            <div class="postmeta-item-sn">
                <span class="postmeta-text d-flex align-items-center">
                    <span class="readind-time-i pr-2">
                        <img src="<?php echo PATH_SN ?>/uploads/clock-dark.svg">
                    </span>
                    <span class="reading-time-text"><span>Przeczytasz w</span>
                        <span>
                         <?php $r_time = get_field('readind_time_prediction'); ?>
                         <?php echo $r_time; ?> 
                        </span>  
                         <span>
                         <?php 
                         if ($r_time == 1) {
                             echo ' minutę';
                         }else if($r_time > 1 && $r_time < 5){
                            echo ' minuty';
                         }else{
                            echo ' minut';
                         }
                          ?>
                        </span>
                    </span>
                </span>
            </div>
        </div>

        <!-- Share mobile for post -->
         <?php if(get_post_type() =='post'): ?>
            <div class="postmeta-item-sn ml-auto share-area-mobile pt-4">
                <div class="share-area-mobile d-flex">
                    <span class="share-label-sn text-dark"><?php _e('Udostępnij:','web14devsn'); ?></span> <span><?php echo do_shortcode('[addtoany]'); ?></span> 
                </div>
            </div>
        <?php endif; ?>

    </header>

    <!--Post content -->
    <section class="single-post-content-section">
        
        <div class="d-flex sp-content-container">

            <div class="share-area-sn share-area-desktop">
                <?php echo do_shortcode('[addtoany]'); ?>
            </div>
            <div class="single-post-content">
               <h1 class="single-post-title">
                   <?php the_title(); ?>
               </h1>
               <div class="post-meta-row d-flex align-items-center">
                   <div class="post-meta-i">
                       <img src="<?php echo PATH_SN ?>/uploads/pen.svg" alt="Autor">
                   </div>
                   <div class="post-meta-text">
                       <?php if(get_post_type()=='post'): ?>
                       <h6><?php the_author(); ?></h6>
                       <?php elseif( get_post_type() == 'notatki_prasowe'): ?>
                        <h6><?php the_field('zrodlo_np'); ?></h6>
                       <?php endif; ?>
                   </div>
                   <div class="separator-ver-bordo">
                       |
                   </div>
                   <div class="post-meta-i">
                       <img src="<?php echo PATH_SN ?>/uploads/calendar.svg" alt="Kalendarz">
                   </div>
                   <div class="post-meta-text">
                       <h6><?php the_date(); ?></h6>
                   </div>
               </div>

               <!-- The contant -->
               <div class="sp-content-sn">
                   <?php the_content(); ?>
               </div>
               <!-- Advert area -->
               <?php if (get_field('adv_area_sp')) { ?>
                   <div class="advert-area-sp pb-5">
                       <?php the_field('adv_area_sp'); ?>
                   </div>
               <?php } ?>

               <!-- Content continue -->
                <?php if (get_field('under_adv_area')) { ?>
                   <div class="advert-area-sp">
                       <?php the_field('under_adv_area'); ?>
                   </div>
               <?php } ?>
            </div>
        </div>
    </section>
    
</article><!-- #post-<?php the_ID(); ?> -->


