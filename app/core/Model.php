
<?php

/**
 * Main Model trait
 */

Trait Model
{

    use Database;

 
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "id";

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE "; 
    
        // Build the query with conditions for `$data`
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        } 
    
        // Build the query with conditions for `$data_not`
        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }
    
        // Trim trailing "AND"
        $query = rtrim($query, " AND ");
    
        // Apply limit and offset
        $query .= " LIMIT $this->limit OFFSET $this->offset";
    
        // Merge data arrays for binding parameters
        $data = array_merge($data, $data_not);
    
        // Execute the query
        return $this->query($query, $data);
    }
    
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
    
        // Build conditions for `$data` (equals)
        foreach ($keys as $key) {
            $query .= "$key = :$key AND ";
        }
    
        // Build conditions for `$data_not` (not equals)
        foreach ($keys_not as $key) {
            $query .= "$key != :$key AND ";
        }
    
        // Trim trailing "AND"
        $query = rtrim($query, " AND ");
    
        // Limit to one result
        $query .= " LIMIT 1";
    
        // Merge data arrays for binding parameters
        $data = array_merge($data, $data_not);
    
        // Execute the query and fetch the first result
        $result = $this->query($query, $data);
        return $result ? $result[0] : null;
    }
    

    public function insert($data)
    {
        $keys = array_keys($data);
        $fields = implode(", ", $keys);              
        $placeholders = implode(", :", $keys);        
    
        // Construct the INSERT query
        $query = "INSERT INTO $this->table ($fields) VALUES (:$placeholders)";
    
        // Execute the query
        return $this->query($query, $data);
    }
    

    public function update($id, $data, $id_column = 'Felhasznalo_id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
    
        // Build the SET part of the query
        foreach ($keys as $key) {
            $query .= "$key = :$key, ";
        }
    
        // Trim trailing comma
        $query = rtrim($query, ", ");
    
        // Add the WHERE clause for the custom ID column
        $query .= " WHERE $id_column = :id";
    
        // Bind the ID value to `:id` parameter
        $data['id'] = $id;
    
        // Execute the query
        return $this->query($query, $data);
    }
    

    public function delete($id, $id_column = 'Felhasznalo_id')
    {
        $query = "DELETE FROM $this->table WHERE $id_column = :id";
    
        // Bind the ID value to `:id` parameter
        $data = ['id' => $id];
    
        // Execute the query
        return $this->query($query, $data);
    }

#JogId a jogosultsag eldontesehez

    public function getJogId($felhasznalo_id)
{
    // Query to get the jog_id for the specific user
    $query = "SELECT jog_id FROM $this->table WHERE Felhasznalo_id = :felhasznalo_id LIMIT 1";

    // Execute the query
    $result = $this->query($query, ['felhasznalo_id' => $felhasznalo_id]);

    // Return jog_id if found, otherwise return null
    return $result ? $result[0]->jog_id : null;
}

#Uzenofalhoz minden uzenet selectje
public function getAllMessages()
{
    // Define the query to select all messages from the uzenofal table
    $query = "SELECT Uzenet FROM uzenofal"; // Adjust table and field names as necessary
    
    // Execute the query
    $results = $this->query($query);
    
    // Check if results are returned and return them
    if ($results) {
        return $results; // This will be an array of messages
    }
    
    return []; // Return an empty array if no messages are found
}


    
}