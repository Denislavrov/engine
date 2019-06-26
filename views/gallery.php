<?
/**
 * переменные извне
 * @var $arrayImages
 * @var $errorMessage
 */
?>

<div class="gallery">
    <?php foreach ($arrayImages as $value): ?>
        <a href="/img/gallery/<?=$value?>" class="gallery__item" target="_blank">
            <img class="gallery__img" src="/img/gallery/<?=$value?>" alt="" />
        </a>
    <?php endforeach; ?>
</div>
<form enctype="multipart/form-data" method="post">
    <input type="file" name="myfile">
    <input type="submit" name="ok" value="Загрузить">
</form>

<? if ($errorMessage != ""): ?>
    <div class="error-message"><?=$errorMessage?></div>
<? endif; ?>