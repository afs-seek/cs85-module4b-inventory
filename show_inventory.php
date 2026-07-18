/*
https://github.com/afs-seek/cs85-module4b-inventory/commits/main/

http://localhost/phpmyadmin/index.php?route=/database/sql&db=inventory_db

I sort of had problems doing the commits but I completed them.

*/


<?php
try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($items as $item) {
    echo "<p>{$item['item_name']} ({$item['quantity']} units)</p>";
  }

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
} 
?> 

<?php

try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  $items = []; 
}
?>


<h2>Personal Inventory Database</h2>

<table border="1">
  <tr>
    <th>Item Name</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Purchase Date</th>
  </tr>

  
  <?php foreach ($items as $item): ?>
    <tr>
      
      <td><?php echo htmlspecialchars($item['item_name']); ?></td>
      <td><?php echo htmlspecialchars($item['category']); ?></td>
      <td><?php echo htmlspecialchars($item['quantity']); ?></td>
      <td><?php echo htmlspecialchars($item['purchase_date']); ?></td>
    </tr>
  <?php endforeach; ?>
</table>


/*
Why you chose your items.
I chose items I have and use. I tried to make selections that were somewhat diverse.


How this could scale to real world inventory systems.
It could scale by adding categories that lend themselves to scaling. For example, a barcode system, which a lot of stores require, can help with managing and tracking large amounts of inventory. 

How using PDO protects from SQL injection.
In the code provided for this assignment, there is no SQL injection because there's no user input. SQL injection occurs when a hacker undermines a website by typing malicious input into user fields. The database accepts the information without checking it. PDO allows PHP to communication with the database. It forces the database to interpret commands. 
*/