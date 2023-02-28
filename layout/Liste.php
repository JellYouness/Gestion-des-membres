<?php
    $title="Gestion des membres";
    include "init.php";
    include $template . "header.php"; 
    include $template . "db_connect.php";
    
    if(isset($_POST['submit'])){
        $search=$_POST['search'];
        $sql="select * from membres where nom_membre like '%" . $search . "%'";
    }else{
        $sql="SELECT * from membres";
    }
    
?>
    <div class="search-box">
        <div class="search_bar">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <input type="text" name="search" id="search" placeholder="Entrer le nom du membre" onkeyup="FilterkeyWord()">
            <input type="submit" name="submit" id="search_btn" src="images/search.png" value="" >
            </div>
            </form>
        </div>
        <div class="search-bar">
            <form method="post" id="search-bar" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <input type="text" name="search" id="search-id" placeholder="Entrer le ID du membre" onkeyup="FilterkeyWordById()">
            <input type="submit" name="id_submit" id="search_btn" src="images/search.png" value="" >
            </div>
            </form>
        </div>

</div>

        <div>
            <table class="table" id="table" border="0">
            <?php $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    if($result->rowCount() >0){
                        echo "
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Cin</th>
                        <div id='phone-list'>
                            <th>Civ.</th>
                            <th>D. naissance</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>C. Postal</th>
                            <th>Date creation</th>
                        </div>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>";}?>
                <tbody>
                    <?php 
                    $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    if($result->rowCount() >0){
                        while($row=$result->fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>
                            <td>". $row['id_membre']."</td>
                            <td>".$row['nom_membre']."</td>
                            <td>".$row['prenom_membre']."</td>
                            <td>".$row['cin_membre']."</td>
                            <div id='phone-list'>
                                <td>".$row['sexe_membre']."</td>
                                <td>".$row['date_naissance']."</td>
                                <td>0".$row['tele_membre']."</td>
                                <td>".$row['email_membre']."</td>
                                <td>".$row['adresse']."</td>
                                <td>".$row['ville']."</td>
                                <td>".$row['pays']."</td>
                                <td>".$row['code_postal']."</td>
                                <td>".$row['date_creation']."</td>
                            </div>
                            <td><a href=Edit_membre.php?id=".$row['id_membre']."><img src='images/edit.png' style='width:2.5rem;'> </a></td>
                            <td><a href=Delete_membre.php?id=".$row['id_membre']."><img src='images/trash.png' style='width:2.5rem;'> </a></td>
                        </tr>";
                        } 
                    } ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
        <script>
            function FilterkeyWord() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("search");
                    filter = input.value.toLowerCase();
                    table = document.getElementById("table");
                    tr = table.getElementsByTagName("tr");

                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];

                        if (td) {
                            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }

                function FilterkeyWordById() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("search-id");
                    filter = input.value;
                    table = document.getElementById("table");
                    tr = table.getElementsByTagName("tr");

                    for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[0];
                        if (td) {
                            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
        </script>
        <?php include $template . "footer.php"; ?>