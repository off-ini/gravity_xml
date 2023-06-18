<?php 
include("./utils/const.php");
include("./src/io/db.php");
include("./src/io/db_manager.php");

$gravity = get_gravity($CON);
?>

<!DOCTYPE html>
<html lang="fr">

<?php include("./layout/header.php") ?>

<body>
    <div class="page">
        <?php include("./layout/sidebar.php") ?>

        <div class="content">
            
            <h1 class="main-heading">Dashboard</h1>
            
            <div class="wrapper">

                <div class="welcome">
                    <div class="head">
                        <div class="text">
                            <h2>Gravity_V202211</h2>
                            <span> XML PROJET</span>
                        </div>
                        <img src="html/imgs/welcome.png" alt="welcome-img" class="welcome-img">
                        <img src="html/imgs/activity-03.png" alt="profile_avatar" class="avatar">
                    </div>
                    <div class="infos">
                        <div>
                            <span>Source Data</span>
                            <span>MySQL</span>
                        </div>
                        <div>
                            <span>16</span>
                            <span>Colonnes</span>
                        </div>
                        <div>
                            <span><?php //echo count($gravity); ?></span>
                            <!--<span>Lignes</span>-->
                        </div>
                    </div>
                    
                   
                </div>
                
                    
                    <div class="backup-manager">
                        <div class="widget-heading">
                            <h2>EXTRACTION</h2>
                            <p>Cliquer sur le type de ficher de votre choix pour démarrer le téléchargement</p>
                        </div>
                        
                        <div class="method">
                            <div>
                                <a href="<?php if(file_exists($XML_FILE)) echo $XML_FILE; else  echo '#';  ?>">
                                    <input type="radio" id="megaman" name="method" value="megaman">
                                    <label for="megaman"><i class="fa-solid fa-server"></i>XML</label>
                                </a> 
                            </div>
                            <div>
                                <a href="<?php if(file_exists($CSV_FILE)) echo $XML_FILE; else  echo '#';  ?>">
                                    <input type="radio" id="zero" name="method" value="zero" checked="">
                                    <label for="zero"><i class="fa-solid fa-server"></i>CSV</label>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                
  
            </div>

            <div class="projects">
                <div class="ligne">
                    <div class="block">
                        <h2>Prévisualisation Data</h2>
                    </div>
                    <div class="block">
                        <a href="." class="widget-btn-green" >Actualiser</a>
                    </div>
                    
                
                </div>
                
                <div class="responsive-table2">
                    <table>
                        <thead>
                            <tr>
                                <td>gravity_id</td>
                                <td>Year</td>
                                <td>Country_id_o</td>
                                <td>Country_id_d</td>
                                <td>Distw_harmonic</td>
                                <td>Distw_arithmetic</td>
                                <td>Dist</td>

                                <td>Distcap</td>
                                <td>Contig</td>
                                <td>Comlang_off</td>
                                <td>Comcol</td>
                                <td>Comrelig</td>
                                <td>Pop_o</td>

                                <td>Pop_d</td>
                                <td>Gdp_o</td>
                                <td>Gdp_d</td>
                                <td>Pop_pwt_o</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($gravity != null){
                                foreach($gravity as $element){ 
                                
                            ?>
                            <tr>
                                <td><?php echo $element['gravity_id']; ?></td>												
                                <td><?php echo $element['year']; ?></td>
                                <td><?php echo $element['country_id_o']; ?></td>
                                <td><?php echo $element['country_id_d']; ?></td>
                                
                                <td><?php echo $element['distw_harmonic']; ?></td>
                                <td><?php echo $element['distw_arithmetic']; ?></td>
                                <td><?php echo $element['dist']; ?></td>
                                <td><?php echo $element['distcap']; ?></td>

                                <td><?php echo $element['contig']; ?></td>
                                <td><?php echo $element['comlang_off']; ?></td>
                                <td><?php echo $element['comcol']; ?></td>
                                <td><?php echo $element['comrelig']; ?></td>
                                			
                                <td><?php echo $element['pop_o']; ?></td>
                                <td><?php echo $element['pop_d']; ?></td>
                                <td><?php echo $element['gdp_o']; ?></td>
                                <td><?php echo $element['gdp_d']; ?></td>

                                <td><?php echo $element['pop_pwt_o']; ?></td>
                            </tr>
                           <?php 
                           } }
                           ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>    
    var xmldata;
    var parser = new DOMParser();
    var dom;
    document.getElementById("fileselected")
        .addEventListener('change', function (){            
            document.getElementById("LogDiv").innerHTML='=> Chargement du fichier XML...<br>';            
            document.getElementById("LogDiv").innerHTML+='=> Fichier XML Chargé...<br>';
            var fr = new FileReader();
            fr.onload = function () {
                xmldata = fr.result;
                dom = parser.parseFromString(xmldata, "text/xml");
            }
            fr.readAsText(this.files[0]);
            document.getElementById("LogDiv").innerHTML+='=> Traitement terminé ! cliquer sur le boutton "PREVISUALISER" pour parcourir la data<br>';
        });

        function clearlog(){
        document.getElementById("LogDiv").innerHTML="";        
    }

</script>

</html>