<section class="container-card">
    <div>
        <img src="<?=imageUrl($book['image']); ?>">
    </div>
    <div>
        <p>Pavadinimas: <?=$book['name']; ?></p>
        <p>Autorius: <?=$book['author']; ?></p>
        <div>
            <p>Išleidimo data: <?=$book['release_date']; ?></p>
        </div>
        <div>
            <p>Žanras: <?=$book['genre']; ?></p>
        </div>
        <div>
            <p>Leidykla: <?=$book['developer']; ?></p>
        </div>
        <div>
            <p>Aprašymas:</p>
            <p><?=$book['description']; ?></p>
        </div>
    </div>
</section>

