 <?php if(isset($_SESSION['list'])):?>
    <?php foreach ($_SESSION['list'] as $item):?>
        <tr>
            <th><a id="<?= $item['id']?>" class="link"><?= $item[REQUEST_DATE]?></a></th>
            <th><?= $item[TIME]?></th>
            <th><span class="glyphicon 
            <?= $item[EQUAL] ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down'?>" 
            aria-hidden="true"></span></th>
        </tr>
    <?php endforeach;?>
<?php endif;?>