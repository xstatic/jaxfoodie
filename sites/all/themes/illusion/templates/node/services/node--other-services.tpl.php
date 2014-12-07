<?php
	/**
	 * @file
	 * illusion's theme implementation to display a single Other services node.
	 */
	global $base_url; 

?>

<?php if ($page) : ?>
	<section class="section_offset">
        <div class="container">
            <!--post-->
            <article class="clearfix m_bottom_45 m_xs_bottom_30 ">
                <!--post content-->
                <figure>
                    <figcaption>
                        <h3 class="fw_light color_dark m_bottom_30"><?php print $title; ?></h3>
                        <div>
                            <?php print $node->body['und'][0]['value']; ?>
                        </div>
                        <!--tags-->
                    </figcaption>
                </figure>
            </article>         
        </div>
    </section>
<?php endif; ?>
