<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
?>

<h2>Stock</h2>

<?php if (empty($stocks)) : ?>
    <p>Aucun produit en stock.</p>
<?php else : ?>
    <table>
        <tr>
            <th>Produit</th>
            <th>Quantité restante</th>
        </tr>

        <?php foreach ($stocks as $stock) : ?>
            <tr>
                <td><?= htmlspecialchars($stock['nom']) ?></td>
                <td><?= htmlspecialchars($stock['quantite']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
