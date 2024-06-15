<?php
function create_table($table_name, $attributes) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);

    $attributes_sql = implode(', ', $attributes);

    $query = "CREATE TABLE IF NOT EXISTS $table_name ($attributes_sql)";

    $db->query($query);

    $db->close();
}

function update_table($table_name, $values, $condition) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);

    $values_sql = implode(', ', $values);

    $query = "UPDATE $table_name SET $values_sql WHERE $condition";

    $result = $db->query($query);

    $db->close();

    //return $result;
}


function select_from_table($query) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);

    // Exécuter la requête SQL
    $result = $db->query($query);

    // Récupérer les résultats de la requête
    $rows = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $rows[] = $row;
    }

    $db->close();

    return $rows;
}


function delete_from_table($query) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);

    $result = $db->query($query);

    $db->close();

    return $result;
}

function add_element($table_name, $data) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);

    $columns = implode(', ', array_keys($data));
    $values = implode(', ', array_map(function($value) use ($db) {
        return "'" . $db->escapeString($value) . "'";
    }, array_values($data)));

    $query = "INSERT INTO $table_name ($columns) VALUES ($values)";

    $result = $db->exec($query);

    $db->close();

    return $result;
}

function drop_table_if_exists($table_name) {
    $dbFile = '../db/data.db';
    $db = new SQLite3($dbFile);
    $query = "DROP TABLE IF EXISTS $table_name";
    $db->exec($query);
    $db->close();
}

/*

$table_name = "users";
$attributes = ["id INTEGER PRIMARY KEY", "name TEXT", "age INTEGER"];

create_table($table_name, $attributes);

$table_name = "users";
$values = ["name = 'John'", "age = 30"];
$condition = "id = 1";

update_table($table_name, $values, $condition);


$query = "SELECT * FROM users WHERE age > 18";
$results = select_from_table($query);

foreach ($results as $row) {
    echo "Name: " . $row['name'] . ", Age: " . $row['age'] . "<br>";
}


$query = "DELETE FROM users WHERE age < 18";
$result = delete_from_table($query);

if ($result) {
    echo "Suppression réussie !";
} else {
    echo "Une erreur s'est produite lors de la suppression.";
}
// Example usage:
$data = [
    'column1' => 'value1',
    'column2' => 'value2',
    // Add more columns and values as needed
];
$table_name = 'your_table_name';

$success = add_element($table_name, $data);
if ($success) {
    echo "Element added successfully!";
} else {
    echo "Failed to add element.";
}
*/
?>