<?php
    require_once(__DIR__.'/../includes/header.php');
    require_once(__DIR__.'');

    function Ctr_ajoutProduit(){
        $nom = $_POST['nom'];
        $prenom=$_POST['prenom'] ;
        $courriel= $_POST['courriel'];
        $sexe=$_POST['sexe'];
        $daten=$_POST['daten'];
        
        $membre = new Membre(0,$nom,$prenom,$courriel,$sexe,$daten,"");
        Mdl_Ajouter($membre,$_POST['password']);
    }
?>


<body>
    <form action="/action_page.php" enctype="multipart/form-data">
      <h1>Formulaire d'ajout de produit</h1>
      <div class="formcontainer">
        <hr/>
        <div class="container">
          <label for="nom"><strong>Nom du produit</strong></label>
          <input type="text" placeholder="Nom du produit" name="nom" required>

          <label for="categorie"><strong>Catégorie</strong></label>
          <input type="text" placeholder="Catégorie du produit" name="categorie" required>

          <label for="ingredients"><strong>Ingrédients</strong></label>
          <input type="text" placeholder="Ingrédients du produit" name="ingredients" required>

          <label for="prix"><strong>Prix ($)</strong></label>
          <input type="number" placeholder="Prix du produit" name="prix" required>

          <label for="quantite"><strong>Quantité</strong></label>
          <input type="number" placeholder="Quantité disponible" name="quantite" required>

          <label for="photo"><strong>Photo</strong></label>
          <input type="file" name="photo" accept="image/*" required>
        </div>
        <button type="submit">Ajouter le produit</button>
      </div>
    </form>
  </body>
</html>