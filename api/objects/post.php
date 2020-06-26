<?php
/**
 *  Product
 */
class Post extends Database
{
  protected $image;
  protected $title;
  protected $description;
  protected $detail_description;
  protected $admin_id;
  protected $category;
  protected $created;
  protected $post_id;

  public function image($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->image = $value;
  }

  public function title($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->title = $value;
  }

  public function description($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->description = $value;
  }

  public function detail_description($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->detail_description = $value;
  }

  public function admin_id($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->admin_id = $value;
  }

  public function category($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->category = $value;
  }

  public function created($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->created = $value;
  }

  public function post_id($value) {
    $value = mysqli_escape_string($this->get_connection(), $value);
    $this->post_id = $value;
  }



  public function add() {
    // query
    $query = "INSERT INTO `post` (
    `admin_id`, `title`, `description`, `detail_description`, `image`, `created`
    ) VALUES (
    '".$this->admin_id."',
    '".$this->title."',
    '".$this->description."',
    '".$this->detail_description."',
    '".$this->image."',
    '".$this->created."'
    )";
    return mysqli_query($this->get_connection(), $query);
  }

  public function get_id_product() {
    // query
    $query = "SELECT `id` FROM `product` WHERE `date` = '".$this->date."' AND `name_product` = '".$this->name_product."' AND `id_user` = '".$this->id_user."'";
    $query_attachment = mysqli_query($this->get_connection(), $query);
    $row = mysqli_fetch_array($query_attachment);
    return $row['id'];
  }

  public function add_category() {
    // query
    $query = "INSERT INTO `product_images` (
    `id_product`,
    `image`
    ) VALUES (
    '".$this->id."',
    '".$this->link_image."'
    )";
    return mysqli_query($this->get_connection(), $query);
  }

  // get post first
  public function get_post_new()
  {
    $query = "SELECT * FROM `post` ORDER BY `post_id` DESC LIMIT 1";
    $query_attachment = mysqli_query($this->get_connection(), $query);
    return mysqli_fetch_array($query_attachment);
  }

  //get 20 first post
  public function get_post()
  {
    $query = "SELECT *, `post`.`created` AS `created_post` FROM `post` JOIN `admin` ON `post`.`admin_id` = `admin`.`admin_id` ORDER BY `post_id` DESC LIMIT 1, 21";
    $query_attachment = mysqli_query($this->get_connection(), $query);
    return $query_attachment;
  }

  // get detail post
  public function get_post_detail()
  {
    $query = "SELECT *, `post`.`created` AS `created_post` FROM `post` JOIN `admin` ON `post`.`admin_id` = `admin`.`admin_id` WHERE `post_id` = ".$this->post_id;
    $query_attachment = mysqli_query($this->get_connection(), $query);
    return mysqli_fetch_array($query_attachment);
  }

  // get detail post
  public function get_post_popular()
  {
    $query = "SELECT `like`.`post_id`, `title`, COUNT(*) AS `total` FROM `like` JOIN `post` ON `like`.`post_id` = `post`.`post_id` GROUP BY `like`.`post_id` ORDER BY `total` DESC LIMIT 6";
    $query_attachment = mysqli_query($this->get_connection(), $query);
    return $query_attachment;
  }
}
?>