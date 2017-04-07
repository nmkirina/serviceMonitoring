<?php if (isset($_SESSION['item'])):?>
<div><strong>Время запроса:</strong> <?= $_SESSION['item'][REQUEST_DATE]?></div>
    <div><strong>Время ответа:</strong> <?= $_SESSION['item'][RESPONSE_DATE]?></div>
    <div><strong>Время ожидания:</strong> <?= $_SESSION['item'][TIME]?> сек / <?= $_SESSION['item'][TIME] * 1000?> млс</div>
    <div><strong>Результат проверки:</strong> <?= $_SESSION['item'][EQUAL]?></div>
    <div><strong>Ответ сервера</strong> </div><div><?= $_SESSION['item'][RESPONSE_BODY]?></div>
<?php endif;?>

