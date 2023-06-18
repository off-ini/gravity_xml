<?php
session_start();
include("./utils/const.php");

$xml = null;
if(file_exists($XML_FILE)){
    $xml = simplexml_load_file($XML_FILE);
}

?>

<!DOCTYPE html>
<html lang="fr">

<?php include("./layout/header.php") ?>

<body>
    <div class="page">
    <?php include("./layout/sidebar.php") ?>

        <div class="content">
            
            <h1 class="main-heading">CSV TO MySQL</h1>
            <?php if(isset($_SESSION["msg"])){ ?>
                <h3><?php echo $_SESSION["msg"]; ?></h3>
            <?php unlink($_SESSION["msg"]); } ?>
            <div class="wrapper">
                <div class="welcome">
                    <div class="head">
                        <div class="text">
                            <h2>XML PROJET</h2>
                            <span>Gravity_V202211</span>
                        </div>
                        <img src="html/imgs/welcome.png" alt="welcome-img" class="welcome-img">
                        <img src="html/imgs/activity-03.png" alt="profile_avatar" class="avatar">
                    </div>
                    <div class="infos">
                        <div>
                            <span>Type Change</span>
                            <span>CSV TO MySQL</span>
                        </div>
                        <div>
                            <span>16</span>
                            <span>Colonnes</span>
                        </div>
                        <div>
                            <span><?php echo isset($xml) ? count($xml) : '0'; ?></span>
                            <span>Lignes</span>
                        </div>
                    </div>
                    <section class="w3-container w3-card w3-leftbar w3-topbar">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <label style="font-weight: bold;" for="csvUpload">Charger un fichier CSV </label>
                            <input class="w3-input" type="file" name="csvUpload" id="csvUpload">
                            <input name="submit" type="submit" onclick="readCSV()" class="w3-bar w3-teal" value="Charger le fichier CSV">
                        </form>
                    </section>

                    <section class="w3-container w3-card w3-leftbar w3-topbar">
                        <button onclick="clearlog()" class="w3-bar w3-teal">Effacer les Log</button>
                    </section>
                   
                </div>
                <div class="latest-uploads">
                    <h2>Application LOG</h2>
                    
                    <div id="LogDiv" class="w3-dark-grey" style="height: 45vh; font-family: monospace; overflow: auto;">
                    </div>
                </div>
  
            </div>

            <div class="projects">
                <div class="ligne">
                    <div class="block">
                        <h2>XML DATA</h2>
                    </div>
                    <div class="block">
                        <a href="add.php" class="widget-btn-Tomato" >Ajouter Gravity</a>
                    </div>
                    <div class="block">
                        <a href="insert_db_s.php" class="widget-btn-Gold" >Inserer dans la BD MysQL</a>
                    </div>
                    <div class="block">
                        <a href="<?php if(file_exists($XML_FILE)) echo $XML_FILE; else  echo '#';  ?>" class="widget-btn-green" >Exporter la table XML</a>
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
                                <td>Actions</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($xml != null){
                                foreach($xml as $element){
                            
                            ?>
                            <tr>
                                <td><?php echo $element->gravity_id; ?></td>												
                                <td><?php echo $element->year; ?></td>
                                <td><?php echo $element->country_id_o; ?></td>
                                <td><?php echo $element->country_id_d; ?></td>
                                
                                <td><?php echo $element->distw_harmonic; ?></td>
                                <td><?php echo $element->distw_arithmetic; ?></td>
                                <td><?php echo $element->dist; ?></td>
                                <td><?php echo $element->distcap; ?></td>

                                <td><?php echo $element->contig; ?></td>
                                <td><?php echo $element->comlang_off; ?></td>
                                <td><?php echo $element->comcol; ?></td>
                                <td><?php echo $element->comrelig; ?></td>
                                			
                                <td><?php echo $element->pop_o; ?></td>
                                <td><?php echo $element->pop_d; ?></td>
                                <td><?php echo $element->gdp_o; ?></td>
                                <td><?php echo $element->gdp_d; ?></td>

                                <td><?php echo $element->pop_pwt_o; ?></td>
                                
                                <td class="status">
                                    <span class="fa-regular fa-trash-can " style="color: #a30031;"></span>
                                    <span  class="fa-solid fa-eye" style="color: #009e54;"></span>
                                </td>
                            </tr>
                           <?php
                                }
                            }
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