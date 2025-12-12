<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Checkout - Cozy Coffee</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="checkout-page">
        <section>
            <div class="special">
                <h2>Your <span>Cozy Coffee</span> Cart</h2>
                <ul id="checkoutList"></ul>
                <h3>Total: SR <span id="totalPrice">0.00</span></h3>
                
                <a href="MenuPage.php">Back to Menu</a>
                <a href="HomePage.php">Home Page</a>
            </div>
        </section>
        <script>
            // Get the list and total elements
            var list = document.getElementById("checkoutList");
            var totalElement = document.getElementById("totalPrice");
            
            var total = 0; // start at 0
            // Get the items from the URL
            var itemsString = window.location.search.split("items=")[1];
            var items = [];
            
            if (itemsString) {
                // Decode the URL (replace %20 with spaces)
                itemsString = decodeURIComponent(itemsString);
                
                // Split items by "|"
                items = itemsString.split("|");
            }
            
            function renderCart() {
                list.innerHTML = ""; // Clear current list
                total = 0;
                
                for (var i = 0; i < items.length; i++) {
                    // Add item to list
                    var li = document.createElement("li");
                    li.textContent = items[i];
                    
                    // Create delete button
                    var deleteBtn = document.createElement("button");
                    deleteBtn.textContent = "Delete";
                    deleteBtn.style.marginLeft = "10px";
                    deleteBtn.addEventListener("click", (function(index) {
                        return function() {
                            items.splice(index, 1); // Remove the item
                            renderCart(); // Re-render list
                        };
                    })(i));
                    
                    li.appendChild(deleteBtn);
                    list.appendChild(li);
                    
                    // Add item's price to total
                    var price = parseFloat(items[i].split("SR ")[1]);
                    total += price;
                }
                
                // Show the total
                totalElement.textContent = total.toFixed(2);
            }
            renderCart(); // Initial render
        </script>
    </body>
</html>