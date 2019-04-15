<!DOCTYPE html>
<html>
    <head>
        <title>Busser</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/host.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <label>Available Tables:</label>
                    <div class="radio-butt">
                        <input type="radio" id="table1" name="tableSelect" value="t1">
                        <label for="table1">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table 5
                        </label>

                        <input type="radio" id="table2" name="tableSelect" value="t2">
                        <label for="table2">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table 8
                        </label>

                        <input type="radio" id="table3" name="tableSelect" value="t3">
                        <label for="table3">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table 18
                        </label> 
                        
                        <input type="radio" id="table4" name="tableSelect" value="t4">
                        <label for="table4">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table 25
                        </label> 
                        
                        <input type="radio" id="table5" name="tableSelect" value="t5">
                        <label for="table5">
                            <img src="../assets/table.png" class="radio-img"/>
                            Table 13
                        </label> 
                    </div>
                </div>
                <div class="col">
                    <label>Available Waiters:</label>
                    <div class="radio-butt">
                        <input type="radio" id="waiter1" name="waiterSelect" value="w1">
                        <label for="waiter1">
                            <img src="../assets/waiter.png" class="radio-img"/>
                            Waiter 15
                        </label>

                        <input type="radio" id="waiter2" name="waiterSelect" value="w2">
                        <label for="waiter2">
                            <img src="../assets/waiter.png" class="radio-img"/>
                            Waiter 3
                        </label>

                        <input type="radio" id="waiter3" name="waiterSelect" value="w3">
                        <label for="waiter3">
                            <img src="../assets/waiter.png" class="radio-img"/>
                            Waiter 22
                        </label> 
                        
                        
                        <input type="radio" id="waiter4" name="waiterSelect" value="w4">
                        <label for="waiter4">
                            <img src="../assets/waiter.png" class="radio-img"/>
                            Waiter 7
                        </label> 
                        
                        <input type="radio" id="waiter5" name="waiterSelect" value="w5">
                        <label for="waiter5">
                            <img src="../assets/waiter.png" class="radio-img"/>
                            Waiter 25
                        </label> 
                    </div>
                </div>
                <div class="col">
                    <input type="submit"/>
                </div>
            </div>
        </div>
    </body>
</html>