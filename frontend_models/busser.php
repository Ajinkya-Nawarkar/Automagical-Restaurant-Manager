<!DOCTYPE html>
<html>
    <head>
        <title>Busser</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/busser.css">
    </head>
    <body>
        <form action = "" method="post">
        <div class="container">
            <?php
                session_start();
                $eid = $_SESSION['hosteid'];
                
                include "../backend_models/busser.php";
                $busser = new Busser($eid);
                $tables = $busser->getDirtyTables();
            ?>
            <div class="row">
                <div class="col-8">
                    Dirty Tables:
                </div>
                <div class="col-4"></div>
            </div>
            <?php
            $i = 0;
            foreach($tables as $table){
                echo '<div class="row">
                    <div class="col-8">
                        <label id="table1">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table '. $table . '
                        </label>
                    </div>
                    <div class="col-4">
                        <input type="submit" name="table'. $i .'" value = "Table Clean"/>
                    </div>
                </div>';
                $i += 1;
            }
            $i = 0;
            foreach($tables as $table){
                if (isset($_POST['table'.$i.''])) {
                    $busser->setTableStateOpen($table);
                }
            $i += 1;
            header("Refresh:0");
            }
            ?>

        </div>
        </form>
    </body>
</html>
