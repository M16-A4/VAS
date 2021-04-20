class hospitalclass {

    public $hospitalId;
    public $name;
    public $zipcode;
//  public location (coordinates)
    public $staffId;

    private $db;

  //  public static function createDummy($name, $zipcode = null) {
  //      return new Child(null, null, $zipcode, false, null, null);
  //  }

    public function __construct($db, $name, $zipcode = null, $doInsert = true, $hospitalId = null, $staffId = null) {
        if ($doInsert) {
            $isOk = $db->insert(VAS_DB_PREFIX . "Hospitals", [
                'name' => $name,
                'zipcode' => $zipcode,
                'staff_id' => $staffId
            ]);

            if ($isOk) {
                $this->hospitalId = intval($db->lastInsertId());
                $this->name = $name;
                $this->zipcode = $zipcode;
                $this->staffId = $staffId;
                $this->db = $db;
                return $this;
            }
        } else {
            $this->gospitalId = $hospitalId;
            $this->name = $name;
            $this->zipcode = $zipcode;
            $this->staffId = $staffId;
            $this->db = $db;
            return $this;
        }
    }

    public static function getByIdandLoc($db, $hospitalId, $locationId) {
        $hospital = $db->fetchAssoc("SELECT * FROM " . VAS_DB_PREFIX . "hospital WHERE hospital_Id = ? AND zip_code = ?", [$hospitalId, $locationId]);

        if (!empty($hospital)) {
            return $hospital;
        } else {
            return false;
        }
    }

    public function getLocation() {

    }
}
