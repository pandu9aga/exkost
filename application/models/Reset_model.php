<?php
	class Reset_model extends CI_Model
	{
		public function get_member_by_username($email)
		{
			return $this->db->get_where('akun', array('email_akun' => $email))->row();
		}

		public function update_reset_key($email,$reset_key)
		{
			$this->db->where('email_akun', $email);
			$data = array('reset_pass_akun'=>$reset_key);
			$this->db->update('akun', $data);
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}else{
				return FALSE;
			}
		}

		public function reset_password($reset_key, $password)
		{
			$this->db->where('reset_pass_akun', $reset_key);
			$data = array('pass_akun' => $password);
			$this->db->update('akun', $data);
			return ($this->db->affected_rows()>0 )? TRUE:FALSE;
		}
		public function check_reset_key($reset_key)
		{
			$this->db->where('reset_pass_akun', $reset_key);
			$this->db->from('akun');
			return $this->db->count_all_results();
		}
	}
