<section class="container-card ">
        <form class="form"  method="POST" action="update.php" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= ($book['id'] ?? ''); ?>">

            <label for="name">Pavadinimas:</label><br>
            <input class="form-field" type="text" name="name"  value="<?= ($book['name'] ?? ''); ?>" placeholder="Knygos pavadinimas" ><br>

            <label for="author">Autorius:</label><br>
            <input class="form-field" type="text" name="author"  value="<?= ($book['author'] ?? ''); ?>" placeholder="Knygos autorius" ><br>

            <label for="release_date">Išleidimo metai:</label><br>
            <input class="form-field" type="number" min="1900" max="2099" step="1" name="release_date" value="<?= ($book['release_date'] ?? ''); ?>" placeholder="Išleidimo metai"><br>

            <label for="image">Nuotrauka:</label><br>
            <?= imageInput('image', $book['image'] ?? ''); ?>
            <input class="form-field" type="file" name="image" placeholder="Nuotrauka"><br>

            <label for="genre">Žanras:</label><br>
            <input class="form-field" type="text" name="genre"  value="<?= ($book['genre'] ?? ''); ?>" placeholder="Žanras"><br>

            <label for="developer">Leidykla:</label><br>
            <input class="form-field" type="text" name="developer" value="<?= ($book['developer'] ?? ''); ?>" placeholder="Leidykla"><br>

            <div class="form-field">
                    <input type="hidden" name="reserved" value="0">
                    <input type="checkbox" id="reserved" name="reserved" value="1"  <?=  ($book['reserved'] ? 'checked':''); ?>/>
                    <label for="reserved">Rezervuota</label>
            </div>
            <select class="form-field" name="user_id" id="user_id" <?=  ($book['reserved'] ? '':'disabled'); ?>>
                <option value="">Pasirinkite vertę</option>
                <?php foreach ($users as $user){?>
                <option value="<?= ($user['id'] ?? ''); ?>" <?=  ($user['id']===$book['user_id'] ? 'selected':''); ?>>
                    <?= ($user['first_name'] ?? ''); ?>
                </option>
                <?php }; ?>
            </select>
            <label for="description">Aprašymas:</label><br>
            <textarea type="text" name="description"  ><?= ($book['description'] ?? ''); ?> </textarea><br>
            <input class="button" type="submit" value="Patvirtinti"><br>
        </form>
    </section>
