<?php
class Home_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_data_by_email($datas)
	{
		$this->db->select('*');
		$this->db->from('tb_admin');
		$this->db->where($datas);
		$this->db->where("status_admin", "aktif");
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}
	
	public function update_password($datas)
    {
		$this->db->where('email_admin', $datas["email_admin"]);
		$this->db->update('tb_admin', $datas);
		return true;
    }
	
  public function getCourseById($id)
  {
    $this->db->select('*');
    $this->db->from('tb_course c'); 
    $this->db->where('c.course_id',$id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
	public function selectLatestiDCourse()
	{
      $this->db->select('*');
      $this->db->from('tb_course');
      $query = $this->db->order_by('course_id', 'desc');
      $query = $this->db->limit(0,1);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
	}
  public function getContentPage($id)
  {
    $this->db->select('*');
    $this->db->from('tb_page p'); 
    $this->db->where('p.id_page',$id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  public function getBankAll()
  {
    $this->db->select('*');
    $this->db->from('tb_bank'); 
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  public function selectAllCategorynya()
  {
    $query = $this->db->get('tb_course_category');
    $result = $query->result();
    
    return $result;
  }
  
  
   public function getCategoryBySubId($idsub)
    {
      $this->db->select('*');
      $this->db->join('tb_course_subcategory cs', 'cs.course_category_id = cc.course_category_id', 'left');
      $this->db->from('tb_course_category cc'); 
      $this->db->where('cs.course_subcategory_id', $idsub);
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
  public function getTrainerByCourseId($id)
  {
    $this->db->select('*');
    $this->db->from('tb_course c'); 
    $this->db->join('tb_trainer t', 't.trainer_id = c.trainer_id', 'left');
    $this->db->where('c.course_id',$id);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  
  public function get_total_buyer_by_id($id)
  {
    $this->db->select('sum(qty) as jumlahnya, status_transaksi');
    $this->db->from('tb_detail_transaksi d'); 
    $this->db->join('tb_transaksi t', 't.id_transaksi = d.id_transaksi', 'left');
    $this->db->where('d.course_id',$id);
    $this->db->where('t.status_transaksi !=', 'Reject');
	$this->db->group_by('d.course_id');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  public function getIdByEmail($email)
  {
    $cond = array("customer_email" => $email);
    
    $this->db->select('*');
    $this->db->from('tb_customer');
    $this->db->where($cond);
    
        $query = $this->db->get();
    
    return $query->result();
  }
  
  public function getIdPartnerByEmail($email)
  {
    $cond = array("partner_email" => $email);
    
    $this->db->select('*');
    $this->db->from('tb_partner');
    $this->db->where($cond);
    
	$query = $this->db->get();
    
    return $query->result();
  }
  
  public function cekkonfirmasi($idtransaksi)
    {
    $cond = array("id_transaksi" => $idtransaksi);
    
    $this->db->select('*');
    $this->db->from('tb_confirm');
    $this->db->where($cond);
    
        $query = $this->db->get();
        $jumlah = $query->num_rows();
    
    return $jumlah;
  }
  
  
  public function insertcart($idcustomer, $id)
    {
    $cond = array("course_id" => $id,'customer_id'=>$idcustomer);
    
    $this->db->select('*');
    $this->db->from('tb_cart');
    $this->db->where($cond);
    
        $query = $this->db->get();
        $jumlah = $query->num_rows();
    
    
    //kalau id course sudah ada di db
    if($jumlah > 0)
    {
      $cond = array("course_id" => $id,'customer_id'=>$idcustomer);
      
      $this->db->select('count');
      $this->db->from('tb_cart');
      $this->db->where($cond);
      $query = $this->db->get();
       
      $count = $query->result();
      $count = $count[0]->count;
      
      $countnya = array("count" => ++$count);
      $this->db->update('tb_cart', $countnya);
    }else
    {
      $datas = array(
            'customer_id' => $idcustomer,
            'course_id' => $id,
            'count' => 1
          );
          
      $query = $this->db->insert('tb_cart', $datas);
      return true;
    }
        
    }

  public function insertwishlist($idcustomer, $id)
    {
    $cond = array("course_id" => $id,'customer_id'=>$idcustomer);
    
    $this->db->select('*');
    $this->db->from('tb_wishlist');
    $this->db->where($cond);
    
        $query = $this->db->get();
        $jumlah = $query->num_rows();
    
    
    //kalau id course sudah ada di db
    if($jumlah > 0)
    {
      return false;
    }else
    {
      $datas = array(
            'customer_id' => $idcustomer,
            'course_id' => $id
          );
          
      $query = $this->db->insert('tb_wishlist', $datas);
      return true;
    }
        
    }
  
  
  public function cekidcourse($idcustomer, $id)
  {
    
    $cond = array("course_id" => $id,'customer_id'=>$idcustomer);
    
    $this->db->select('*');
    $this->db->from('tb_cart');
    $this->db->where($cond);
    
        $query = $this->db->get();
        $jumlah = $query->num_rows();
    
    return $jumlah;
  }
  
  public function getLatestIdTransaksi()
  {
    $this->db->select('*');
    $this->db->from('tb_transaksi');
    $this->db->order_by('id_trans','desc');
    
	$query = $this->db->get();
    $hasil = $query->result();
	
	if($hasil == null)
	{
		$month = date('m');
		$year = date('Y');
		
		$idbefore = 1;
		$hasil = "exc-[".$month."]-[".$year."]-".$idbefore;
	}
	
    return $hasil;
  }
  
	public function getLatestIdTransaksiTemp($idcustomer)
	{
		$this->db->select('*');
		$this->db->from('tb_temp_transaksi');
		$this->db->where('customer_id', $idcustomer);
		$this->db->where('status_transaksi', '0');
		$this->db->order_by('id_temp','desc');
    
		$query = $this->db->get();
    
		return $query->result();
	}
  
  
	public function getLatestIdTransaksiTemp2()
	{
		$this->db->select('*');
		$this->db->from('tb_temp_transaksi');
		$this->db->order_by('id_temp','desc');
    
		$query = $this->db->get();
    
		return $query->result();
	}
	
	public function prosesIdTransaksi($idcustomer, $idbefore)
	{
		$month = date('m');
		$year = date('Y');
	
		if($idbefore == "")
		{
			$id = 1;
			$id = "exc-[".$idcustomer."]-[".$month."]-[".$year."]-".$id;
		}else
		{
			if(count(explode("-", $idbefore)) == 4)
			{
				$id = explode("-", $idbefore)[3];
				$id = ($id+1);
				$id = "exc-[".$idcustomer."]-[".$month."]-[".$year."]-".$id;
			}else
			{
				$id = explode("-", $idbefore)[4];
				$id = ($id+1);
				$id = "exc-[".$idcustomer."]-[".$month."]-[".$year."]-".$id;
			}
		}
	
		
    
		return $id;
	}
  
  public function insertDbTransaksi($idtransaksi, $idcustomer, $totaltransaksi, $status, $tanggal)
    {
        
    $datas = array(
          'id_transaksi'=> $idtransaksi,
          'customer_id' => $idcustomer,
          'total_transaksi' => $totaltransaksi,
          'status_transaksi' => $status,
          'tgl_transaksi' => $tanggal      
        );
        
    $query = $this->db->insert('tb_transaksi', $datas);
    
  }
  
	public function insertDbTransaksiTemp($idtransaksi, $idcustomer, $status)
    {
		$datas = array(
          'id_transaksi_temp'=> $idtransaksi,
          'customer_id' => $idcustomer,
          'status_transaksi' => $status,  
        );
        
		$query = $this->db->insert('tb_temp_transaksi', $datas);
	}
  
  public function insertTypePayment($idtransaksi, $payment)
    {
        
    $datas = array(
          'id_transaksi'=> $idtransaksi,
          'payment_type' => $payment  
        );
        
    $query = $this->db->insert('tb_payment', $datas);
    
  }
  
  public function getEmailByKode($kode)
  {
    $this->db->select('*');
    $this->db->from('tb_customer c'); 
    $this->db->join('tb_transaksi t', 't.customer_id = c.customer_id', 'left');
    $this->db->where('t.id_transaksi',$kode);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
  
  

	public function insertDbDetailTransaksi($idtransaksi, $idcourse, $subtotal,$qty, $coursename, $coursethumbnail, $coursefee, $coursesubcategory, $coursecategory, $trainername, $trainerphoto, $partnerid, $coursedate)
	{
    $datas = array(
			'id_transaksi'=> $idtransaksi,
			'course_id' => $idcourse,
			'sub_total_transaksi' => $subtotal,
			'course_name'=> $coursename,
			'course_thumbnail' => $coursethumbnail,
			'course_fee' => $coursefee,
			'qty' => $qty,
			'course_subcategory' => $coursesubcategory,
			'course_category' => $coursecategory,
			'trainer_name'=> $trainername,
			'trainer_photo' => $trainerphoto,
			'partner_id' => $partnerid,
			'course_date'=>$coursedate
        );
        
    $query = $this->db->insert('tb_detail_transaksi', $datas);
    
  }
  
  
  public function insertcartspec($idcustomer, $id, $count)
    {
    $datas = array(
            'customer_id' => $idcustomer,
            'course_id' => $id,
            'count' => $count
          );
          
    $query = $this->db->insert('tb_cart', $datas);
  }
  
  public function selectcart($idcustomer)
    {
    $cond = array('customer_id'=>$idcustomer);
    
    $this->db->select('*');
    $this->db->from('tb_cart');
    $this->db->where($cond);
    $query = $this->db->get();
    
    return $query->result();
    
    }
    
    
  public function updatecart($idcustomer, $id, $count)
    {
    $cond = array("course_id" => $id,"customer_id"=>$idcustomer);
    $upd = array("course_id" => $id,"customer_id"=>$idcustomer, "count" => $count);
    
    $this->db->where($cond);
    $this->db->update('tb_cart', $upd);
        
    }
  
  
  
	public function update_status_id_temp_transaksi($idcustomer)
	{
		$cond = array("customer_id" => $idcustomer);
		$update = array("status_transaksi" => '1');
		
		$this->db->where($cond);
		$this->db->update('tb_temp_transaksi', $update);
		
		return true;        
    }
	
  public function deletecartnya($idcustomer, $id)
    {
    $cond = array("course_id" => $id,"customer_id"=>$idcustomer);
        $this->db->where($cond);
        $this->db->delete('tb_cart');
        return true;
    }
  
  public function deletecartspecific($idcustomer)
  {
    $cond = array("customer_id"=>$idcustomer);
        $this->db->where($cond);
        $this->db->delete('tb_cart');
        return true;
  }

  public function insertconfirmation($datas)
    {    
    $query = $this->db->insert('tb_confirm', $datas);
    
    return true;
  }
  
  public function updatestatusconfirmation($id)
    {  
    $datas = array(
          'id_transaksi'=> $id
        );
        
    $this->db->where($datas);
        $status = array("status_transaksi" => "confirmed");
        $query = $this->db->update('tb_transaksi', $status);
    
    return true;
    
  }
  
  
  
  public function updateNpwpPartner($datas)
  {  
    
      $this->db->where('partner_id', $datas["partner_id"]);
      $this->db->update('tb_partner', $datas);
      return true;
    
  }
  
  
  
    public function verifCustomer($datas)
    {
      $this->db->where($datas);
      $id = array("customer_status" => "Active");
      $query = $this->db->update('tb_customer', $id);
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function verifPartner($datas)
    {
      $this->db->where($datas);
    $this->db->where('partner_status', 'Pending');
      $id = array("partner_status" => "Confirm");
      $query = $this->db->update('tb_partner', $id);
      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    
}
?>