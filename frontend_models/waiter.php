<!DOCTYPE html>
<html>
    <head>
        <title>Waiter</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/waiter.css">
    </head>
    <body>
        <form action = "" method="post">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <label>Menu:</label>
                    <div class="radio-butt">
                        <input type="checkbox" id="burger" name="orderSelect[]" value="Burger"/>
                        <label id="menu-item" for="burger">
                            <img src="../assets/burger.png" class="radio-img"/>
                            Burger
                        </label>
                        <span>How many burgers?  <input type="number" name="burger-count" min="1" max="10" value="1"/></span>
                        <br/>

                        <input type="checkbox" id="Hotdog" name="orderSelect[]" value="Hotdog">
                        <label for="Hotdog">
                            <img src="../assets/hotdog.png" class="radio-img"/>
                            Hotdog
                        </label>
                        <span>How many hotdogs?  <input type="number" name="hotdog-count" min="1" max="10" value="1"/></span>
                        <br/>

                        <input type="checkbox" id="Pizza" name="orderSelect[]" value="Pizza">
                        <label for="Pizza">
                            <img src="../assets/pizza.png" class="radio-img"/>
                            Pizza
                        </label> 
                        <span>How many pizzas?  <input type="number" name="pizza-count" min="1" max="10" value="1"/></span>
                        <br/>
                        
                        <input type="checkbox" id="Chicken" name="orderSelect[]" value="Chicken">
                        <label for="Chicken">
                            <img src="../assets/chicken.png" class="radio-img"/>
                            Chicken
                        </label> 
                        <span>How many chickens?  <input type="number" name="chicken-count" min="1" max="10" value="1"/></span>
                        <br/>
                        
                        <input type="checkbox" id="Salad" name="orderSelect[]" value="Salad">
                        <label for="Salad">
                            <img src="../assets/salad.png" class="radio-img"/>
                            Salad
                        </label> 
                        <span>How many salads?  <input type="number" name="salad-count" min="1" max="10" value="1"/></span>
                    </div>
                </div>
                <div class="col-4">
                        <input type="submit" name="order" value="Submit Order"/>
                        <input type="submit" name="receipt" value="Print Receipt"/>
                        <input type="submit" name="clear" value="Clear Table"/>
                        <input type="submit" name="refresh" value="Refresh"/>
        <?php
            session_start();
            $eid = $_SESSION['waitereid'];
            include "../backend_models/waiter.php";
            $waiter = new Waiter($eid);
            $myOrder = $waiter->initiateOrder();
            
            if (isset($_POST['orderSelect'])){
                $orders = $_POST['orderSelect'];
                foreach($orders as $order){
                    if ($order == "Burger"){
                        $bCount = $_POST['burger-count'];
                        for($i = 0; $i < $bCount; $i++){
                            $waiter->addItemToOrder("Burger");
                        }
                    }
                    if ($order == "Hotdog"){
                        $hCount = $_POST['hotdog-count'];
                        for($i = 0; $i < $hCount; $i++){
                            $waiter->addItemToOrder("Hotdog");
                        }
                    }
                    if ($order == "Pizza"){
                        $pCount = $_POST['pizza-count'];
                        for($i = 0; $i < $pCount; $i++){
                            $waiter->addItemToOrder("Pizza");
                        }
                    }
                    if ($order == "Chicken"){
                        $cCount = $_POST['chicken-count'];
                        for($i = 0; $i < $cCount; $i++){
                            $waiter->addItemToOrder("Chicken");
                        }
                    }
                    if ($order == "Salad"){
                        $sCount = $_POST['salad-count'];
                        for($i = 0; $i < $sCount; $i++){
                            $waiter->addItemToOrder("Salad");
                        }
                    }
                }
                $waiter->createOrder();
            }
            if (isset($_POST['clear'])){
                $tid = $waiter->getTableAssignment();
                $waiter->setTableStateUnclean($tid);
            }
            if (isset($_POST['refresh'])) {
                header("Refresh:0");
            }
        ?>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>
