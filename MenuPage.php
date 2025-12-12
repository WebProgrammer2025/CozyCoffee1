<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Cozy Coffee - Menu</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body class="menu-page">
        <section>
            <div class="special">
                <h2><span class="highlight">Cozy Coffee</span> Menu</h2>
                
                <h3 class="highlight">Coffee</h3>
                <ul id="coffeeMenu"></ul>
                
                <h3 class="highlight">Snacks</h3>
                <ul id="snacksMenu"></ul>
                
                <div class="button-container">
                    <a onclick="goToCart()">Go to Cart</a>
                    <a href="HomePage.php">Back to Home</a>
                </div>
            </div>
        </section>
        <script>
            // Arrays for menu items
            var coffeeItems = [
                "Espresso - SR 2.50",
                "Americano - SR 3.00",
                "Cappuccino - SR 3.50",
                "Latte - SR 4.00",
                "Mocha - SR 4.50"
            ];

            var snacksItems = [
                "Chocolate Chip Cookie - SR 1.50",
                "Croissant - SR 2.00",
                "Muffin - SR 2.50",
                "Banana Bread Slice - SR 2.00"
            ];

            // Function to display menu items
            function displayMenu(items, elementId) {
                var menu = document.getElementById(elementId);
                for (var i = 0; i < items.length; i++) {
                    var li = document.createElement("li");
                    li.innerHTML = '<input type="checkbox" name="item" value="' + items[i] + '"> ' + items[i];
                    menu.appendChild(li);
                }
            }

            // Display both menus
            displayMenu(coffeeItems, "coffeeMenu");
            displayMenu(snacksItems, "snacksMenu");

            // Go to cart function
            function goToCart() {
                var checkboxes = document.getElementsByName("item");
                var items = [];

                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        items.push(checkboxes[i].value);
                    }
                }

                if (items.length == 0) {
                    alert("Please select at least one item!");
                    return;
                }
                
                 // Send selected items to cart page using "|" as separator
                window.location.href = "CartPage.php?items=" + items.join("|");
            }
        </script>
    </body>
</html>

