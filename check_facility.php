<?php
require_once('initialize.php');

// Check the facility_list table structure
echo "<h2>Facility List Table Structure</h2>";
$structure_query = $conn->query("DESCRIBE facility_list");
if($structure_query) {
    echo "<table border='1'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while($field = $structure_query->fetch_assoc()) {
        echo "<tr>";
        foreach($field as $key => $value) {
            echo "<td>" . ($value ?? "NULL") . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error getting table structure: " . $conn->error;
}

// Check the facility_list data
echo "<h2>Facility List Data</h2>";
$data_query = $conn->query("SELECT * FROM facility_list WHERE delete_flag = 0 LIMIT 10");
if($data_query) {
    if($data_query->num_rows > 0) {
        echo "<table border='1'>";
        
        // Get field names
        $fields = $data_query->fetch_fields();
        echo "<tr>";
        foreach($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        
        // Reset pointer
        $data_query->data_seek(0);
        
        // Get data
        while($row = $data_query->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $key => $value) {
                echo "<td>" . ($value ?? "NULL") . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found in facility_list table.";
    }
} else {
    echo "Error getting table data: " . $conn->error;
}
?>
