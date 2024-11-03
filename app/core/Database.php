<?php

Trait Database
{
    # Database connection function
    private function connect()
    {
        try {
            # Define the database connection string
            $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
            
            # Create a new PDO connection
            $con = new PDO($string, DBUSER, DBPASS);
            
            # Set error mode to exception for better error handling
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            # Return the connection object
            return $con;
        } catch (PDOException $e) {
            # Handle connection error
            die("Database connection failed: " . $e->getMessage());
        }
    }


     # Query function
     public function query($query, $data = [])
     {
         # Connect to the database
         $con = $this->connect();
         
         # Prepare the query
         $stm = $con->prepare($query);
 
         # Execute the query with the provided data
         $check = $stm->execute($data);
 
         if ($check) {
             # Fetch all results as objects
             $result = $stm->fetchAll(PDO::FETCH_OBJ);
             
             # Return the result if it's a non-empty array
             if (is_array($result) && count($result)) {
                 return $result;
             }
         }
         return false;
     }

     public function get_row($query, $data = [])
     {
         # Connect to the database
         $con = $this->connect();
         
         # Prepare the query
         $stm = $con->prepare($query);
 
         # Execute the query with the provided data
         $check = $stm->execute($data);
 
         if ($check) {
             # Fetch all results as objects
             $result = $stm->fetchAll(PDO::FETCH_OBJ);
             
             # Return the result if it's a non-empty array
             if (is_array($result) && count($result)) {
                 return $result[0];
             }
         }
         return false;
     }


}
