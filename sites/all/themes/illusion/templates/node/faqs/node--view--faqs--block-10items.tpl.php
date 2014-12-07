<?php
$filter_string = "";
foreach ($node->field_faq_category['und'] as $category) {
    $filter_string .= ' ' . str_replace(' ', '_', strtolower($category['taxonomy_term']->name));
}
?>
<dl class="accordion_item r_corners wrapper m_bottom_5 tr_all faqs_item<?php echo $filter_string; ?>">
    <dt class="accordion_link relative color_dark tr_all"><?php echo $title; ?>
<!--    <span class="icon_wrap_size_1 circle d_block hide">
        <i class="icon-minus"></i>
    </span>
    <span class="icon_wrap_size_1 circle d_block show">
        <i class="icon-plus"></i>
    </span>-->
    </dt>
    <dd class="fw_light color_dark"><?php print $node->body['und'][0]['value']; ?></dd>
</dl>