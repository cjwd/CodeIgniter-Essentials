<?php

class Post extends CI_Model
{
	/**
	 * Get the total number of posts in the database
	 * @return int Row count
	 */
	function get_post_count(){
		$this->db->select('post_id')->from('posts')->where('active', 1);
		$query = $this->db->get();
		return $query->num_rows();

	}

	function get_posts($num=20, $start=0)
	{
		//$sql ="SELECT * FROM posts WHERE active=1 ORDER BY date_added DESC LIMIT 0,20; ";
		$this->db->select()->from('posts')->where('active', 1)->order_by('date_added','desc')->limit($num, $start);
		//get the results
		$query =$this->db->get();
		// return results
		return $query->result_array();
	}

	/**
	 * Gets a single post from the database
	 * @param  int $post_id Identifier of the post table
	 * @return array          
	 */
	function get_post($post_id)
	{
		$this->db->select()->from('posts')->where(array('active'=>1, 'post_id'=>$post_id))->order_by('date_added', 'desc');
		$query = $this->db->get();
		return $query->first_row('array');
	}

	function insert_post($data)
	{
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
	}

	function update_post($post_id, $data)
	{
		$this->db->where('post_id', $post_id);
		$this->db->update('posts', $data);
	}

	function delete_post($post_id)
	{
		$this->db->where('post_id', $post_id);
		$this->db->delete('posts');
	}
}