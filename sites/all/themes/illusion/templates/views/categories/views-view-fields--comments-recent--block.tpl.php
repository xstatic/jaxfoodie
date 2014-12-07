<li class="m_bottom_15">
    <i class="icon-comment-empty m_right_8 fs_large color_grey_light_2 d_block f_left"></i>
    <!--<a href="#" class="color_grey">admin</a> on <a href="#" class="color_dark"><b>Proin dictum</b></a>-->
    <?php print str_replace('xml:lang=""', '', $fields['name']->content); ?> on <b class="comment-title"><?php print $fields['subject']->content; ?></b>
</li>