class childclass {

    public $childId;
    public $email;
    public $firstname;
    public $gender;
    public $zipcode;
    public $DOB;
    public $parentId;

    private $db;

    public static function createDummy($DOB, $gender, $zipcode = null) {
        return new Child(null, null, null, $DOB, $gender, $zipcode, false, null, null);
    }

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

            if ($isOk) {
                $this->childId = intval($db->lastInsertId());
                $this->email = $email;
                $this->firstname = $firstname;
                $this->gender = $gender;
                $this->zipcode = $zipcode;
                $this->DOB = $DOB;
                $this->parentId = $parentId;
                $this->db = $db;
                return $this;
            }
        } else {
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

    public static function getByEmail($db, $childId, $email) {
        $child = $db->fetchAssoc("SELECT * FROM " . VAS_DB_PREFIX . "children WHERE email = ?", [$email]);

        if (!empty($child)) {
            return $child;
        } else {
            return false;
        }
    }

    public static function getById($db, $childId) {
        $child = $db->fetchAssoc("SELECT * FROM " . VAS_DB_PREFIX . "children WHERE child_id = ?", [$childId]);

        if (!empty($child)) {
            return new Child($db, $child['email'], $child['first_name'],  $child['DOB'],  $child['gender'], $child['zipcode'], false, $child['child_id']); #at the place of parent id, false is placed
        } else {
            return false;
        }
    }

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
