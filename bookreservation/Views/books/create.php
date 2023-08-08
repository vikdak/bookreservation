<section class="container-card ">
    <form class="form"  method="POST" action="store.php" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="0">

        <label for="name">Pavadinimas:</label><br>
        <input class="form-field" type="text" name="name"  value="" placeholder="Knygos pavadinimas" ><br>

        <label for="author">Autorius:</label><br>
        <input class="form-field" type="text" name="author"  value="" placeholder="Knygos autorius" ><br>

        <label for="release_date">Išleidimo metai:</label><br>
        <input class="form-field" type="number" min="1900" max="2099" step="1" name="release_date" value="" placeholder="Išleidimo metai"><br>

        <label for="image">Nuotrauka:</label><br>
        <input class="form-field" type="file" name="image" placeholder="Nuotrauka"><br>

        <label for="genre">Žanras:</label><br>
        <input class="form-field" type="text" name="genre"  value="" placeholder="Žanras"><br>

        <label for="developer">Leidykla:</label><br>
        <input class="form-field" type="text" name="developer" value="" placeholder="Leidykla"><br>

        <div class="displayNone">
            <input type="hidden" name="reserved" value="0">
            <input type="checkbox" id="reserved" name="reserved" value="1" >
            <label for="reserved">Rezervuota</label>
        </div>

        <select class="displayNone" name="user_id" id="user_id">
            <option value="">Pasirinkite vertę</option>
            <?php foreach ($users as $user){?>
                <option value="<?= ($user['id'] ?? ''); ?>">
                    <?= ($user['first_name'] ?? ''); ?>
                </option>
            <?php }; ?>
        </select>
        <label for="description">Aprašymas:</label><br>
        <textarea type="text" name="description"  ></textarea><br>
        <input class="button" type="submit" value="Patvirtinti"><br>
    </form>
</section>
