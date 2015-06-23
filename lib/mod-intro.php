<!-- INTRO BEGIN -->
<?php if ( $smof_data['bnk_intro_title'] || $smof_data['bnk_intro_content'] || $smof_data['bnk_intro_button'] != '' ) { ?>


<section class="home-page-intro row">
    <article class="intro">
        <header class="entry-header">
            <h2 class="entry-title vintage-type replace">
            <?php if ($smof_data['bnk_intro_title']) { 
            	echo stripslashes($smof_data['bnk_intro_title']); 
            } ?>
            </h2>
        </header>
        <div class="entry-content">
            <?php if ($smof_data['bnk_intro_content']) {
				echo '<p>';           
				echo stripslashes($smof_data['bnk_intro_content']); 
				echo '</p>';           

			}?>
			<?php if ($smof_data['bnk_intro_button']) { ?>
                <p><a href="<?php echo home_url( '/' ); ?>?page_id=<?php echo $smof_data['bnk_intro_page']; ?>" class="btn primary">
                <?php echo $smof_data['bnk_intro_button']; ?>
                </a></p>
            <?php }?>
            
            
        </div>
    </article>
    <hr class="thin"/>
</section>	

<?php } ?>
<!-- INTRO END -->