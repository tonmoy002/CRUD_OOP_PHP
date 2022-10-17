<?php 

namespace Core\DB;

 class Dbconnect 
 { 
        private $_localhost = 'localhost'; 
        private $_user = 'root'; 
        private $_password = 'root'; 
        private $_dbname = 'php_crud'; 
        
        protected $connection; 
        
        public function __construct() 
        { 
        
            if(!isset($this-> connection)) 
            { 
                        
                //echo "DB Connect";
                $this->connection = new \mysqli($this->_localhost , $this->_user , $this->_password , $this->_dbname); 
                if(!isset($this-> connection))  {
                    echo "Connection error";
                }
            
            } 

            return $this->connection; 
        
        } 
 } 
   
 ?> 