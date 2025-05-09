class Item_model extends CI_Model {
  
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
        
    public function get_item($id) {
        $query = $this->db->get_where('items', array('id' => $id));
        return $query->row();
    }
        

    public function update_item($id, $filename = NULL) {
    $data = array(
        'name' => $this->input->post('name'),
        'description' => $this->input->post('description'),
    );
            
    if($filename) {
        $data['filename'] = $filename;
    }
            
    $this->db->where('id', $id);
    return $this->db->update('items', $data);
}
