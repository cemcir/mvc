<?php
    class MySqlEntityRepositoryBase implements IEntityRepository {
        protected $db;// veritabanı bağlantı nesnesi
        protected $entity;// veritabanı tablosuna ait sınıf
        protected $table;// ilgili veritabanı tablosu
        protected $id;// veritanı tablosuna ait id 

        public function __construct($db,$entity) { //bağımlı enjeksiyon yardımıyla ilgili varlığı ve veritanı bağlantısını ata
            $this->db=$db;
            $this->entity=$entity;
            $this->id=$entity->Id;
            $this->table=$entity->Table;
        }
        
        private function addValue($argse=[])// veritabanı tablosuna eklenecek olan sütunların isimlerini oluşturur $argse=['email'=>'enescemcir1994@gmail.com','name'=>'Enes','surname'=>'CEMCİR'] dizisini
        //parametre olarak alır diziye ait key bilgilerini string email=?,name=?,surname=? şeklinde geriye döner
        {
            $values = implode(',', array_map(function ($item) {// dizinin key değerlerini virgül ile map le email,name,surname gibi
                return $item . '=?';//virgül atadıktan sonra =? ifadesini virgülden önce aralara ekle o halde $values = email=?,name=?,surname=? olur
            }, array_keys($argse))); //dizinin tüm key değerlerini al

            return $values;
        }
        
        //alternatif algoritma yukarıdaki addValue fonksiyonuyla aynı işi yapar
        /*
        private function addValue($argse=[]) { // parametre olarak entity al
            $keys=array_keys($argse);// $argse dizisinin key değerlerini al  
            $str=null;
            foreach($keys as $key) { // dizinin tüm keylerini döngü ile gez
                if($key==$keys[count($keys)-1]) { // dizinin son keyinin değeri gelen döngüden gelen key ile eşit mi kontrol et 
                    $str=$str."".$key."=?"; // str değerine key değerini ve string değerini ekle 
                }
                else {
                    $str=$str."".$key."=?,"; // str değerine key değerini ve string değerini ekle 
                }
            }
            return $str; //email=?,name=?,surname=? gibi bir ifade döner
        }
        */
        public function GetAll($options = []) {
            if(!empty($options['columns_name']) && !empty($options['columns_sort']) && empty($options['limit'])) {// options dizisinde ki limit,colums_name,colums_sort değerlerinin boş olup olmadığını kontrol et
                $stmt=$this->db->prepare("SELECT * FROM $this->table ORDER BY {$options['columns_name']} {$options['columns_sort']}"); // örneğin select * from settings order by settings_id desc sorgusu çalışacak
            }
            else if(!empty($options['columns_name']) && !empty($options['columns_sort'] && !empty($options['limit']))) {
                $stmt=$this->db->prepare("SELECT * FROM $this->table ORDER BY {$options['columns_name']} {$options['columns_sort']} LIMIT {$options['limit']}");
                //örneğin select * from settings order by settings_must asc limit 5 sorgusu çalışacak ilk 5 değeri tablodan alır
            }
            else {
                $stmt=$this->db->prepare("SELECT * FROM $this->table");// örneğin select * from settings sorgusu çalışacak 
            }
            $stmt->execute();//ilgili sorguyu yürüt
            return $stmt; // sorgu objesini geriye dön 
        }

        public function Get($value) {
            $stmt=$this->db->prepare("SELECT * FROM $this->table WHERE $this->id=?"); // ilgili tablodan belirtilen id ye ait veriyi alır  
            $stmt->execute([htmlspecialchars(strval($value))]);//id değerinin olası html taglarını süz ilgili sorguyu id değeri ile yürüt
            return $stmt;// sorgu objesini geriye dön  
        }

        public function Add($values) {//entity dizisini al örneğin ['blogs_title'=>'Php Kulllanım Alanları','blogs_slug'=>'php-kullanim-alanlari'] gibi
            $stmt=$this->db->prepare("INSERT INTO $this->table SET {$this->addValue($values)}");// örneğin insert into blogs set blogs_title=?,blogs_slug=? sorgusu çalışacak
            $stmt->execute(array_values($values));
            return $stmt;
        }

        public function Update($values) { //$values=['blogs_id'=>1,'blogs_title'=>'Php Kullanım Alanları','blogs_content'=>'Web sunucu programlama dili php']
            $columns_id = $values[$this->id];// gelen varlığın id bilgisini al
            unset($values[$this->id]);// id değerini sil
            $valuesExecute = $values;// varlık değerlerinin id haric kalan kısmını yeni değişkene at
            $valuesExecute += [$this->id=> $columns_id];//id bilgisini yeni varlık dizisinin sonuna ekle 

            $stmt=$this->db->prepare("UPDATE $this->table SET {$this->addValue($values)} WHERE $this->id=?");// örneğin update blogs set blogs_content=? where blogs_id=? sorgusu çalışacak
            $stmt->execute(array_values($valuesExecute)); // varlık dizisinin değerlerini array_values metodu ile al ve sorguyu yürüt
            return $stmt;
        }

        public function Delete($value) {
            $stmt=$this->db->prepare("DELETE FROM $this->table WHERE $this->id=?");
            $stmt->execute([htmlspecialchars(strval($value))]);
            return $stmt;
        }

        public function QSql($sql) {
            $stmt=$this->db->prepare($sql);// parametre olarak girilen veritabanı sorgusunu çalıştır 
            //örnegin $sql = select * from products left join categories on products.category_id=categories.category_id gibi 
            $stmt->execute();// ilgili sql sorgusunu yürüt
            return $stmt;// sorgu objesini geri dön
        }

        public function GetByColumn($column,$value) {//ilgili sütuna ait satırı alır
            $stmt=$this->db->prepare("SELECT * FROM $this->table WHERE $column=?"); // örneğin select * from settings where settings_id=? sorgusu çalışacak
            $stmt->execute([htmlspecialchars(strval($value))]);// html taglarını süz ve parametre olarak gönderilen id değerini yürüt
            return $stmt;// sorgu objesini geri dön
        }
    }
?>