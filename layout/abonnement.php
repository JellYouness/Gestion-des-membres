<?php
    $title="Gestion des abonnements";
    include "init.php";
    include $template . "header.php"; 
    include $template . "db_connect.php";
    if(isset($_POST['name_submit'])){
        $search=$_POST['search'];
        $sql="select * from membres where nom_membre like '%" . $search . "%'";
    }else if(isset($_POST['id_submit'])){
        $search=$_POST['search'];
        $sql="select * from membres where id_membre like '". $search."'";
    }else{
        $sql="SELECT * from membres";
    }
?>
    <div class="search-box">
        <div class="search-bar">
            <form method="post" id="search-bar" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
            <input type="text" name="search" id="search" placeholder="Entrer le nom du membre"  onkeyup="FilterkeyWord()">
            <input type="submit" name="name_submit" id="search_btn" src="images/search.png" value="" >
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
            <table class="table-abo" id="table-abo" border="0">
                
                    <?php 
                    $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    if($result->rowCount() >0){
                        echo "<thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Cin</th>
                                    <th>Abonnements</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>";
                        while($row=$result->fetch(PDO::FETCH_ASSOC)){
                            $query = "select count(*) as nbr from membres natural join abonnement where id_membre =".$row['id_membre'];
                            $resultq = $db->query($query);
                            $count= $resultq->fetch(PDO::FETCH_ASSOC);
                            echo "
                            <tr>
                                <td>". $row['id_membre']."</td>
                                <td>".$row['nom_membre']."</td>
                                <td>".$row['prenom_membre']."</td>
                                <td>".$row['cin_membre']."</td>
                                <td>".$count['nbr']."</td>
                                <td><a href=add_abo.php?id=".$row['id_membre']."><img src='images/abo.png' style='width:2.5rem;'> </a></td>
                                <td><a href=view_abo.php?id=".$row['id_membre']."><img src='images/eye.png' style='width:2.5rem;'> </a></td>
                            </tr>";
                        }
                    }else{
                        echo '<div class="alert msg"> Résultat non trouvé!! </div>';
                    }?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>

        <script>
            function FilterkeyWord() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("search");
                    filter = input.value.toLowerCase();
                    table = document.getElementById("table-abo");
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
                    table = document.getElementById("table-abo");
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

        <!-- <script>
            const form = document.getElementById('search-bar');
            const submit = document.getElementById('search');
            submit.addEventListener("keyup", function(e){
                e.preventDefault();
                form.submit();
            });
        </script> -->
        <?php include $template . "footer.php"; ?>