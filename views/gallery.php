<?
/**
 * переменные извне
 * @var $arrayImages
 * @var $errorMessage
 */
?>
    <h1>Gallery</h1>

<div class="gallery">
    <?php foreach ($arrayImages as $value): ?>
        <a href=/imagepage/?id=<?=$value['id']?> class="gallery__item">
            <img class="gallery__img" src="/img/gallery/<?=$value['url']?>" alt="" />
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