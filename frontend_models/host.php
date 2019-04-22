<!DOCTYPE html>
<html>
    <head>
        <title>Host</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/host.css">
    </head>
    <body>
    <form action = "" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label>Available Tables:</label>
                    <div class="radio-butt">
                        <?php
                        session_start();
                        #$eid = $_SESSION['hosteid'];
                        
                        include "../backend_models/host.php";
                        $host = new Host(1);
                        $tids = $host->getOpenTables();
                        $take_five = [];
                        if(count($tids) > 5){
                            for($i = 0; $i < 5; $i++){
                                $take_five[$i] = $tids[$i];
                            }
                        }
                        elseif(count($tids) == 0){
                            echo "No Open Tables";
                        }
                        else{
                            for($i = 0; $i < count($tids); $i++){
                                $take_five[$i] = $tids[$i];
                            }
                        }
                        
                        if(count($tids) != 0){
                            if(count($tids) > 0){
                                echo '<input type="radio" id="table1" name="tableSelect" value="' . $take_five[0] . '">
                                <label for="table1">
                                    <img src="../assets/table.png" class="radio-img"/>
                                    Table ' . $take_five[0] .
                                '</label>';
                            }
                            
                            if(count($tids) > 1){
                                echo '<input type="radio" id="table2" name="tableSelect" value="' . $take_five[1] . '">
                                <label for="table2">
                                    <img src="../assets/table.png" class="radio-img"/>
                                    Table ' . $take_five[1] .
                                '</label>';
                            }
                            
                            if(count($tids) > 2){
                                echo '<input type="radio" id="table3" name="tableSelect" value="' . $take_five[2] . '">
                                <label for="table3">
                                    <img src="../assets/table.png" class="radio-img"/>
                                    Table ' . $take_five[2] .
                                '</label>'; 
                            }
                            
                            if(count($tids) > 3){
                                echo '<input type="radio" id="table4" name="tableSelect" value="' . $take_five[3] . '">
                                <label for="table4">
                                    <img src="../assets/table.png" class="radio-img"/>
                                    Table ' . $take_five[3] .
                                '</label>';
                            }
                            
                            if(count($tids) > 4){
                                echo '<input type="radio" id="table5" name="tableSelect" value="' . $take_five[4] . '">
                                <label for="table5">
                                    <img src="../assets/table.png" class="radio-img"/>
                                    Table ' . $take_five[4] .
                                '</label>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <label>Available Waiters:</label>
                    <div class="radio-butt">
                        <?php
                        $wids = $host->getFreeWaiters();
                        $wake_five = [];
                        if(count($wids) > 5){
                            for($i = 0; $i < 5; $i++){
                                $wake_five[$i] = $wids[$i];
                            }
                        }
                        elseif(count($wids) == 0){
                            echo "No Free Waiters";
                        }
                        else{
                            for($i = 0; $i < count($wids); $i++){
                                $wake_five[$i] = $wids[$i];
                            }
                        }
                        
                        if(count($wids) != 0){
                            if(count($wids) > 0){
                                echo '<input type="radio" id="waiter1" name="waiterSelect" value="'.$wake_five[0].'">
                                <label for="waiter1">
                                    <img src="../assets/waiter.png" class="radio-img"/>
                                    Waiter '.$wake_five[0].'
                                </label>';
                            }

                            if(count($wids) > 1){
                                echo '<input type="radio" id="waiter2" name="waiterSelect" value="'.$wake_five[1].'">
                                <label for="waiter2">
                                    <img src="../assets/waiter.png" class="radio-img"/>
                                    Waiter '.$wake_five[1].'
                                </label>';
                            }

                            if(count($wids) > 2){
                                echo '<input type="radio" id="waiter3" name="waiterSelect" value="'.$wake_five[2].'">
                                <label for="waiter3">
                                    <img src="../assets/waiter.png" class="radio-img"/>
                                    Waiter '.$wake_five[2].'
                                </label>'; 
                            }
                            
                            if(count($wids) > 3){
                                echo '<input type="radio" id="waiter4" name="waiterSelect" value="'.$wake_five[3].'">
                                <label for="waiter4">
                                    <img src="../assets/waiter.png" class="radio-img"/>
                                    Waiter '.$wake_five[3].'
                                </label>'; 
                            }
                          
                            if(count($wids) > 4){    
                                echo '<input type="radio" id="waiter5" name="waiterSelect" value="'.$wake_five[4].'">
                                <label for="waiter5">
                                    <img src="../assets/waiter.png" class="radio-img"/>
                                    Waiter '.$wake_five[4].'
                                </label>'; 
                            }
                        }
                        ?>
                    </div>
                </div>
                             
                <div class="col">
                    <input type="submit" name="wait" value="Set Waiter" />
                    <input type="submit" name="refresh" value="Refresh"/>
                </div>
            </div>
        </div>
    </form>
    <?php
        if (isset($_POST['wait'])) {
            if (isset($_POST['tableSelect']) && isset($_POST['waiterSelect'])){
                $host->assignTable($_POST['tableSelect'], $_POST['waiterSelect']);
                header("Refresh:0");
            }
            else{
                echo "Please select both a table and a waiter.";
            }
        }
        if (isset($_POST['refresh'])) {
            header("Refresh:0");
        }
    ?>
    </body>
</html>
