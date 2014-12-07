<div class="clearfix">
    <div class="row">
        <?php
        $count_row = 0;
        foreach ($rows as $id => $row):
            $count_row++;
            ?>
            <?php print $row; ?>
            <?php if ($count_row % 3 == 0): ?>
            </div>
            <div class="row">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>