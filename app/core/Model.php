
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

    public function getUser($username, $password)
    {
        // Kérdezd le a felhasználót az adatbázisból
        // A jelszavakat érdemes titkosítani, például bcrypt-tel
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute(['username' => $username, 'password' => md5($password)]); // Itt md5-t használunk, de érdemes bcrypt-re váltani
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
}