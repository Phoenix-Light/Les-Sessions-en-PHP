<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
    <?php
    if (empty($_SESSION['login'])) {
        header('location: login.php');
        exit();
    } elseif (empty($_SESSION['cart'])) {
        echo 'Votre panier est vide<br>';
        echo '<a href="/index.php">Retour</a>';
    } else {
        if (isset($_SESSION['cart'])) {
            $produit = array_count_values($_SESSION['cart']);
        }
        foreach ($produit as $articleId => $quantity) {
            $_SESSION['totalArticles'] += $quantity;
            if (isset($catalog) && in_array($articleId, array_keys($catalog)) ) {?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $articleId; ?>.jpg"
                             alt="<?= $catalog[$articleId]['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $catalog[$articleId]['name']; ?></h3>
                            <p><?= $catalog[$articleId]['description']; ?></p>
                            <p>Quantité: <?= $quantity; ?></p>
                        </figcaption>
                    </figure>
                </div>
            <?php }
        }
    }
    ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
