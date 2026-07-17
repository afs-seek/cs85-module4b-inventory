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