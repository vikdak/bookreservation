<?php

foreach ($books as $book){
      ?>
    <article data-book-id="<?=$book['id']; ?>" data-user-id="<?=($_SESSION['user']['id']?? ''); ?>">
        <div class="container-card">
            <div class="card">
                <div class="card-header">
                    <a href="show.php?id=<?=$book['id'];?>">
                        <img class="image" src="<?=imageUrl($book['image']); ?>" alt="paveikslelis"/>
                        <img class="<?= !$book['reserved']? 'displayNone':''?> reservedImg" src="<?=imageUrl('rezervuota.png'); ?>" alt="paveikslelis1"/>
                    </a>
                </div>
                <div class="card-body">
                    <h3><?=$book['name']; ?></h3>
                    <p>Žanras: <?=$book['genre']; ?></p>
                    <div class="buttons">
                        <button class="reserved button">REZERVUOTI KNYGĄ</button>
                    </div>
                    <div class="buttons">
                        <a class="button" href="edit.php?id=<?=$book['id'];?>">REDAGUOTI</a><br>
                        <a class="button" href="delete.php?id=<?=$book['id'];?>">IŠTRINTI</a><br>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php }?>
