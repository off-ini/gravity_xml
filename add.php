<?php
include("utils/const.php");
include("src/crud/crud.php");

$gravity = null;
$gravity_id = isset($_GET['gravity_id']) ? $_GET['gravity_id'] : null;
$msg = null;
$error = false;

if(isset($_POST['submit'])){
    $element = [
        "gravity_id" => $gravity_id,
        "year" => $_POST['year'],
        "country_id_o" => $_POST['country_id_o'],
        "country_id_d" => $_POST['country_id_d'],
        "distw_harmonic" => $_POST['distw_harmonic'],
        "distw_arithmetic" => $_POST['distw_arithmetic'],
        "dist" => $_POST['dist'],
        "distcap" => $_POST['distcap'],
        "contig" => $_POST['contig'],
        "comlang_off" => $_POST['comlang_off'],
        "comcol" => $_POST['comcol'],
        "comrelig" => $_POST['comrelig'],
        "pop_o" => $_POST['pop_o'],
        "pop_d" => $_POST['pop_d'],
        "gdp_o" => $_POST['gdp_o'],
        "gdp_d" => $_POST['gdp_d'],
        "pop_pwt_o" => $_POST['pop_pwt_o']
    ];

    if($gravity_id != null){
       $gravity = update_el($XML_FILE, $element);
       if($gravity != null) {
        $msg = "Gravity a été modifier";
       } else{
        $error = true;
        $msg = "Erreur lors de la modification";
       }
    }else{
        $element['gravity_id'] = bin2hex(openssl_random_pseudo_bytes(16));
        $gravity = add_el($XML_FILE, $element);
        if($gravity != null){
            $msg = "Gravity a été ajouter";
        } else{
            $error = true;
            $msg = "Erreur lors de l'ajout";
        }
    }
}


if($gravity_id != null){
    $gravity = get_el($XML_FILE, $gravity_id);
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php include("./layout/header.php") ?>

<body>
    <div class="page">
    <?php include("./layout/sidebar.php") ?>

        <div class="content">
            
            <h1 class="main-heading"><?php echo $gravity_id != null ? 'Mise à jour' : 'Ajouter' ?> DATA XML</h1>            

            <div class="projects">
                
                
                <div class="responsive-table2">
                    <div class="form-wrap">

                        <h1><?php echo $gravity_id != null ? 'Modifier GRAVITY' : 'Nouveau GRAVITY' ?></h1>

                        <?php if($msg != null){ ?>
                            <div class="alert" style="background-color: <?php echo $error ? '#f44336' : '#04AA6D'; ?>">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                                <?php echo $msg; ?>
                            </div>
                        <?php $msg = null; } ?>
                    
                        <form action="<?php echo $gravity_id != null ? '?gravity_id='.$gravity_id : 'add.php' ?>" method="POST">
                            <div class="form-group">
                                <label for="Year">Year</label>
                                <input type="text" name="year" id="Year" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("year")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Country_id_o">Country_id_o</label>
                                <input type="text" name="country_id_o" id="Country_id_o" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("country_id_o")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Country_id_d">Country_id_d</label>
                                <input type="text" name="country_id_d" id="Country_id_d" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("country_id_d")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Distw_harmonic">Distw_harmonic</label>
                                <input type="text" name="distw_harmonic" id="Distw_harmonic" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("distw_harmonic")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Distw_arithmetic">Distw_arithmetic</label>
                                <input type="text" name="distw_arithmetic" id="Distw_arithmetic" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("distw_arithmetic")->item(0)->nodeValue : '' ; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Dist">Dist</label>
                                <input type="text" name="dist" id="Dist" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("dist")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Distcap">Distcap</label>
                                <input type="text" name="distcap" id="Distcap" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("distcap")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Contig">Contig</label>
                                <input type="text" name="contig" id="Contig" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("contig")->item(0)->nodeValue : '' ; ?>">
                            </div>


                            <div class="form-group">
                                <label for="Comlang_off">Comlang_off</label>
                                <input type="text" name="comlang_off" id="Comlang_off" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("comlang_off")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Comcol">Comcol</label>
                                <input type="text" name="comcol" id="Comcol" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("comcol")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Comrelig">Comrelig</label>
                                <input type="text" name="comrelig" id="Comrelig" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("comrelig")->item(0)->nodeValue : '' ; ?>">
                            </div>



                            <div class="form-group">
                                <label for="Pop_o">Pop_o</label>
                                <input type="text" name="pop_o" id="Pop_o" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("pop_o")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Pop_d">Pop_d</label>
                                <input type="text" name="pop_d" id="Pop_d" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("pop_d")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Gdp_o">Gdp_o</label>
                                <input type="text" name="gdp_o" id="Gdp_o" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("gdp_o")->item(0)->nodeValue : '' ; ?>">
                            </div>

                            <div class="form-group">
                                <label for="Gdp_d">Gdp_d</label>
                                <input type="text" name="gdp_d" id="Gdp_d" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("gdp_d")->item(0)->nodeValue : '' ; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Pop_pwt_o">Pop_pwt_o</label>
                                <input type="text" name="pop_pwt_o" id="Pop_pwt_o" value="<?php echo $gravity != null ? $gravity->getElementsByTagName("pop_pwt_o")->item(0)->nodeValue : '' ; ?>">
                            </div>

                            <button type="submit" name="submit" class="btn"><?php echo $gravity_id != null ? 'Modifier' : 'Enregistrer' ;  ?></button>
                            
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>