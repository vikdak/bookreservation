<section class="table">
    <h1>REZERVUOTOS KNYGOS</h1>
    <table>
        <tbody>
        <tr>
            <th>Pavadinimas</th>
            <th>Autorius</th>
            <th>Vartotojas</th>
        </tr>
        <?php foreach ($books as $book){ ?>
            <tr>
                <td><?= $book['name']; ?></td>
                <td><?= $book['author']; ?></td>
                <td><?= $book['first_name']; ?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</section>
