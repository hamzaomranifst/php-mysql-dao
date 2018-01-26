<?php

  interface ArticleDAO {

    public function allWithFournisseurDetails();
    public function storeQuantityArticle($id, $quantite);
    public function PullQuantityArticle($id, $quantite);
    public function getArticleSeuilMin($min);

  }

 ?>
