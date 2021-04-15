class Child {

    public $childId;            //Unique Id of an individual child
    public $email;              //Email to give vaccine reminders
    public $firstname;
    public $gender;
    public $zipcode;            //To find location of nearby hospitals, (Beta)
    public $DOB;                //DateOfBirth to calculate the age of child for appropriate vaccine reminder
    public $parentId;           //A parent can have multiple childs

    private $db;                //database, to connect and save to sql database

    
    //add details of newborn child into the class
    public static function createDummy($DOB, $gender, $zipcode = null) {
        return new Child(null, null, null, $DOB, $gender, $zipcode, false, null, null);
    }


    //To add details of the child to database
    public function __construct($db, $email, $firstname, $DOB, $gender, $zipcode = null, $doInsert = true, $childId = null, $parentId = null) {
        if ($doInsert) {
            $isOk = $db->insert(VAS_DB_PREFIX . "children", [
                'email' => $email,
                'first_name' => $firstname,
                'gender' => $gender,
                'zipcode' => $zipcode,
                'birthday' => $DOB,
                'parent_id' => $parentId
            ]);

            if ($isOk) {                                            //checks if data was added successfully
                $this->childId = intval($db->lastInsertId());       // the whole function updates the missing elements in class from the db (eg: unique ChildId)
                $this->email = $email;
                $this->firstname = $firstname;
                $this->gender = $gender;
                $this->zipcode = $zipcode;
                $this->DOB = $DOB;
                $this->parentId = $parentId;
                $this->db = $db;
                return $this;
            }
        } else {                                            //for viewing data in db.
            $this->childId = $childId;
            $this->email = $email;
            $this->firstname = $firstname;
            $this->gender = $gender;
            $this->zipcode = $zipcode;
            $this->DOB = $DOB;
            $this->parentId = $parentId;
            $this->db = $db;
            return $this;
        }
    }


    //View information of a child through email.(for login)
    public static function getByEmail($db, $childId, $email) {
        $child = $db->fetchAssoc("SELECT * FROM " . VAS_DB_PREFIX . "children WHERE email = ?", [$email]);

        if (!empty($child)) {
            return $child;
        } else {
            return false;
        }
    }


    //To view some elements of the child through ID (for hospital staffs to view during vaccination)
    public static function getById($db, $childId) {
        $child = $db->fetchAssoc("SELECT * FROM " . VAS_DB_PREFIX . "children WHERE child_id = ?", [$childId]);

        if (!empty($child)) {
            return new Child($db, $child['email'], $child['first_name'],  $child['DOB'],  $child['gender'], $child['zipcode'], false, $child['child_id']); #at the place of parent id, false is placed
        } else {
            return false;
        }
    }


    //To find age of child
    public function getAge() {
        $now = new DateTime();
        $birth = new DateTime($this->birthday);

        $interval = $now->diff($birth);

        if ($interval->y > 0) {
            return $interval->y . ' years old';
        }

        if ($interval->m > 0) {
            return $interval->m . ' months old';
        }

        if ($interval->d > 0) {
            return $interval->d . ' days old';
        }

        if ($interval->d == 0) {
            return 'Newborn';
        }
    }

    public function getSchedule() {

    }
}

