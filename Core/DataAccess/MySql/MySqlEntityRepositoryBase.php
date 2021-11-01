<?php
    class MySqlEntityRepositoryBase implements IEntityRepository {
        protected $db;
        protected $entity;
        protected $table;
        protected $id;

        public function __construct($db,$entity) {
            $this->db=$db;
            $this->entity=$entity;
            $this->id=$entity->Id;
            $this->table=$entity->Table;
        }

        private function addValue($argse)
        {
            $values = implode(',', array_map(function ($item) {
                return $item . '=?';
            }, array_keys($argse)));

            return $values;
        }

        public function GetAll($options = []) {
            if(!empty($options['columns_name']) && !empty($options['columns_sort']) && empty($options['limit'])) {
                $stmt=$this->db->prepare("SELECT * FROM $this->table ORDER BY {$options['columns_name']} {$options['columns_sort']}");
            }
            else if(!empty($options['columns_name']) && !empty($options['columns_sort'] && !empty($options['limit']))) {
                $stmt=$this->db->prepare("SELECT * FROM $this->table ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
            }
            else {
                $stmt=$this->db->prepare("SELECT * FROM $this->table");
            }
            $stmt->execute();
            return $stmt;  
        }

        public function Get($value) {
            $stmt=$this->db->prepare("SELECT * FROM $this->table WHERE $this->id=?");
            $stmt->execute([htmlspecialchars($value)]);
            return $stmt;  
        }

        public function Add($values) {
            $stmt=$this->db->prepare("INSERT INTO $this->table SET {$this->addValue($values)}");
            $stmt->execute(array_values($values));
            return $stmt;
        }

        public function Update($values) {

            $columns_id = $values[$this->id];
            unset($values[$this->id]);
            $valuesExecute = $values;
            $valuesExecute += [$this->id=> $columns_id];

            $stmt=$this->db->prepare("UPDATE $this->table SET {$this->addValue($values)} WHERE $this->id=?");
            $stmt->execute(array_values($valuesExecute));
            return $stmt;
        }

        public function Delete($value) {
            $stmt=$this->db->prepare("DELETE FROM $this->table WHERE $this->id=?");
            $stmt->execute([htmlspecialchars($value)]);
            return $stmt;
        }

        public function QSql($sql) {
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        }

        public function GetByColumn($column,$value) {
            $stmt=$this->db->prepare("SELECT * FROM $this->table WHERE $column=?");
            $stmt->execute([htmlspecialchars($value)]);
            return $stmt;
        }
    }
?>