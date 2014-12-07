<!--categories-->
<div class="m_bottom_25">
    <h5 class="fw_light color_dark m_bottom_8">Manufacturers</h5>
    <form id="categories_form">
        <ul>
            <?php foreach ($rows as $id => $row): ?>
                <?php print $row; ?>
            <?php endforeach; ?>
        </ul>
    </form>
</div>