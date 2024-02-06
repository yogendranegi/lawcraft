<?php
/**
 * 
 * @package lawcraft
 */

 //Return if the first widget area has no widgets
 if ( !is_active_sidebar( 'footer-1' )) {
    return;
 } ?>

 <?php //user selected widget columns

    $lawcraft_widget_num = esc_html(get_theme_mod('lawcraft_footer_widgets', '4'));

    if ($lawcraft_widget_num == '4') {
        $lawcraft_cols = 'col-md-3';
    } elseif ($lawcraft_widget_num =='3') {
        $lawcraft_cols = 'col-md-4';
    } elseif ($lawcraft_widget_num =='2') {
        $lawcraft_cols = 'col-md-6';
    }else {
        $lawcraft_cols = 'col-md-12';
    }
?>

<?php
    if ( is_active_sidebar( 'footer-1' ) ){
        ?>
            <div class="widget-column <?php echo esc_attr($lawcraft_cols); ?>">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
        <?php
    }
    if ( is_active_sidebar('footer-2')) {
        ?>
            <div class="widget-column <?php echo esc_attr($lawcraft_cols);?>">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
        <?php
    }
    if (is_active_sidebar( 'footer-3' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($lawcraft_cols); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	}
	if ( is_active_sidebar( 'footer-4' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($lawcraft_cols); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	}
?>