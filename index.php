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
                            <h2>XML PROJET</h2>
                            <span>Gravity_V202211</span>
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
                            <span>80</span>
                            <span>Colonnes</span>
                        </div>
                        <div>
                            <span>8500</span>
                            <span>Lignes</span>
                        </div>
                    </div>
                    
                   
                </div>
                
                    
                    <div class="backup-manager">
                        <div class="widget-heading">
                            <h2>EXTRACTION</h2>
                            <p>Cliquer sur le type de ficher de votre choix pour démarer l'exportation</p>
                        </div>
                        
                        <div class="method">
                            <div>
                                <input type="radio" id="megaman" name="method" value="megaman">
                                <label for="megaman"><i class="fa-solid fa-server"></i>XML</label>
                            </div>
                            <div>
                                <input type="radio" id="zero" name="method" value="zero" checked="">
                                <label for="zero"><i class="fa-solid fa-server"></i>CSV</label>
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
                        <a href="profile.html" class="widget-btn-green" >Actualiser</a>
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
                            <tr>
                                <td>d0f109e1b56b2f0bb324bf0778ab2e53</td>												
                                <td>1982</td>
                                <td>TGO</td>
                                <td>AGO</td>
                                
                                <td>2257</td>
                                <td>2281</td>
                                <td>2126</td>
                                <td>2126</td>

                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0,213368997</td>
                                			
                                <td>2915,098</td>
                                <td>8190,093</td>
                                <td>821652,032</td>
                                <td>6964499,968</td>

                                <td>2915,065918</td>
                                
                                
                                <td class="status">
                                    <span class="fa-regular fa-trash-can " style="color: #a30031;"></span>
                                    <span  class="fa-solid fa-eye" style="color: #009e54;"></span>
                                    <span class="fa-solid fa-pen-to-square" style="color: #e65b2d;"></span>
                                </td>
                            </tr>
                           
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