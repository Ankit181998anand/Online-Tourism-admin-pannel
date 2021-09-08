<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{
	public function get_packages($featured, $recentpost)
	{
		$this->db->select('package.*, cat.category_name, u.first_name, u.last_name');
		$this->db->from('packages package');
		$this->db->join('users u', 'u.id=package.user_id');
		$this->db->join('categories cat', 'cat.id=package.category_id', 'left');
		$this->db->where('package.is_active', 1);

		if($featured) {
			$this->db->where('package.is_featured', 1);
		}
		if($recentpost){
			$this->db->order_by('package.created_at', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_package($id)
	{
		$this->db->select('package.*, cat.category_name, u.first_name, u.last_name');
		$this->db->from('packages package');
		$this->db->join('users u', 'u.id=package.user_id');
		$this->db->join('categories cat', 'cat.id=package.category_id', 'left');
		$this->db->where('package.is_active', 1);
		$this->db->where('package.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//
	/// destination

	public function get_destinations($featured, $recentpost)
	{
	  $this->db->select('destination.*, cat.category_name, u.first_name, u.last_name');
	  $this->db->from('destinations destination');
	  $this->db->join('users u', 'u.id=destination.user_id');
	  $this->db->join('categories cat', 'cat.id=destination.category_id', 'left');
	  $this->db->where('destination.is_active', 1);

	  if($featured) {
	    $this->db->where('destination.is_featured', 1);
	  }
	  if($recentpost){
	    $this->db->order_by('destination.created_at', 'desc');
	    $this->db->limit($recentpost);
	  }
	  $query = $this->db->get();
	  return $query->result();
	}

	public function get_destination($id)
	{
	  $this->db->select('destination.*, cat.category_name, u.first_name, u.last_name');
	  $this->db->from('destinations destination');
	  $this->db->join('users u', 'u.id=destination.user_id');
	  $this->db->join('categories cat', 'cat.id=destination.category_id', 'left');
	  $this->db->where('destination.is_active', 1);
	  $this->db->where('destination.id', $id);
	  $query = $this->db->get();
	  return $query->row();
	}
	//
	//
/// home_banners

	public function get_home_banners()
	{
		$query = $this->db->get('home_banner');
		return $query->result();
	}
	/// packages_banners

		public function get_package_banners()
		{
			$query = $this->db->get('package_banner');
			return $query->result();
		}

		/// destination_banner

			public function get_destination_banners()
			{
				$query = $this->db->get('destination_banner');
				return $query->result();
			}
			/// cat_package
				public function get_cat_packages()
				{
					$query = $this->db->get('cat_package');
					return $query->result();
				}
				/// cat_package

					public function get_cat_destinations()
					{
						$query = $this->db->get('cat_destination');
						return $query->result();
					}
					/// service //why us

						public function get_services()
						{
							$query = $this->db->get('services');
							return $query->result();
						}
						//////  testimonial
						public function get_testimonials()
						{
							$query = $this->db->get('testimonial');
							return $query->result();
						}

	public function get_categories()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_page($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('pages');
		return $query->row();
	}

	public function insert_contact($contactData)
	{
		$this->db->insert('contacts', $contactData);
		return $this->db->insert_id();
	}

	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}
/////////////////////// get_user_timeline


public function get_user_timeline($token)
{
	$this->db->select('timeline.*, u.first_name, u.last_name, u.pimage,u.id as luser_id');
	$this->db->from('timelines timeline');
	$this->db->join('users u','timeline.user_id=u.id');
	$this->db->order_by('timeline.posted_at','desc');
	$this->db->where('u.token',$token);
	$query = $this->db->get();
	return $query->result();
}

//////////////////////// get_user_timeline

public function get_user_timelin($id)
{
	$this->db->select('timeline.*, u.first_name, u.last_name,u.id as luser_id');
	$this->db->from('timelines timeline');
	$this->db->join('users u', 'u.id=timeline.user_id');
	$this->db->where('timeline.id', $id);
	$query = $this->db->get();
	return $query->row();
}

/////////////////// inserttimeline


public function inserttimeline($timelineData)
{
	$this->db->insert('timelines', $timelineData);
	return $this->db->insert_id();
}

 ////////////////updateTimeline


	public function updateTimeline($id, $timelineData)
	{
		$this->db->where('id', $id);
		$this->db->update('timelines', $timelineData);
	}

//////////////////// deleteTimeline

	public function deleteTimeline($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('timelines');
	}

///////////////////////get_user_info

public function get_user_info($token)
{
	$this->db->select('user.first_name,user.last_name,user.id,user.pimage,user.cover,user.mobile,user.email,user.bio,user.username,user.title,user.p_no,user.country,user.state,user.city,user.pc');
	$this->db->from('users user');
	$this->db->where('user.token', $token);
	$query = $this->db->get();
	return $query->row();
}
////////////////// bookingData
public function bookingData($bookingData)
{
	$this->db->insert('booking_des', $bookingData);
	return $this->db->insert_id();
}
//////////////////////// get_user_booking_des
public function get_user_booking_des($token)
{
	$this->db->select('b_d.*,des.title as des_title');
	$this->db->from('booking_des b_d');
	$this->db->join('users u','b_d.user_id=u.id');
	$this->db->join('destinations des','b_d.des_id=des.id');
	$this->db->where('u.token',$token);
	$query = $this->db->get();
	return $query->result();
}
////////////////


	public function get_admin_packages()
	{
		$this->db->select('package.*, u.first_name, u.last_name');
		$this->db->from('packages package');
		$this->db->join('users u', 'u.id=package.user_id');
		$this->db->order_by('package.created_at', 'desc');
		$query = $this->db->get();
		return $query->result();
	}


	public function get_admin_package($id)
	{
		$this->db->select('package.*, u.first_name, u.last_name');
		$this->db->from('packages package');
		$this->db->join('users u', 'u.id=package.user_id');
		$this->db->where('package.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return true;
		}
		return false;
	}

	public function insertBlog($packageData)
	{
		$this->db->insert('packages', $packageData);
		return $this->db->insert_id();
	}


	public function updateBlog($id, $packageData)
	{
		$this->db->where('id', $id);
		$this->db->update('packages', $packageData);
	}

	public function deleteBlog($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('packages');
	}
}
