<?php
$heading = get_sub_field('heading');
$text    = get_sub_field('text');
$image   = get_sub_field('image');

if ($image) { ?>
    <div class="row mb-3 mb-lg-4">
        <div class="col-lg-6">
            <h1 class="pageheader-title"><?php the_title(); ?></h1>
            <h2 class="pageheader-heading"><?php echo  $heading; ?></h2>
            <?php echo $text; ?>
        </div>
        <div class="col-lg-6">
            <?php echo wp_get_attachment_image($image, 'one_half', '', array('class' => 'alignnone')); ?>
        </div>
    </div>
<?php } else { ?>
    <div class="row mb-3 mb-lg-4">
        <div class="col-md-12">
            <h1 class="pageheader-title"><?php the_title(); ?></h1>
            <h2 class="pageheader-heading"><?php echo $heading ?></h2>
            <?php echo $text; ?>
        </div>
    </div>
<?php }
