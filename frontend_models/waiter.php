<!DOCTYPE html>
<html>
    <head>
        <title>Waiter</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/waiter.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <label>Menu:</label>
                    <div class="radio-butt">
                        <input type="checkbox" id="burger" name="waiterSelect" value="Burger"/>
                        <label id="menu-item" for="burger">
                            <img src="../assets/burger.png" class="radio-img"/>
                            Burger
                        </label>
                        <span>How many burgers?  <input type="number" id="burger-count" min="1" max="10" value="1"/></span>
                        <br/>

                        <input type="checkbox" id="Hotdog" name="waiterSelect" value="Hotdog">
                        <label for="Hotdog">
                            <img src="../assets/hotdog.png" class="radio-img"/>
                            Hotdog
                        </label>
                        <span>How many hotdogs?  <input type="number" id="hotdog-count" min="1" max="10" value="1"/></span>
                        <br/>

                        <input type="checkbox" id="Pizza" name="waiterSelect" value="Pizza">
                        <label for="Pizza">
                            <img src="../assets/pizza.png" class="radio-img"/>
                            Pizza
                        </label> 
                        <span>How many pizzas?  <input type="number" id="pizza-count" min="1" max="10" value="1"/></span>
                        <br/>
                        
                        <input type="checkbox" id="Chicken" name="waiterSelect" value="Chicken">
                        <label for="Chicken">
                            <img src="../assets/chicken.png" class="radio-img"/>
                            Chicken
                        </label> 
                        <span>How many chickens?  <input type="number" id="chicken-count" min="1" max="10" value="1"/></span>
                        <br/>
                        
                        <input type="checkbox" id="Salad" name="waiterSelect" value="Salad">
                        <label for="Salad">
                            <img src="../assets/salad.png" class="radio-img"/>
                            Salad
                        </label> 
                        <span>How many salads?  <input type="number" id="salad-count" min="1" max="10" value="1"/></span>
                    </div>
                </div>
                <div class="col-4">
                        <button>Submit Order</button>
                        <button>Print Receipt</button>
                        <button>Clear Table</button>
                </div>
            </div>
        </div>
    </body>
</html>
