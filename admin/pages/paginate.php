<?php
  function paginate($page)
  {
    $data = [];
    $equipment_per_page = 50;

    // Calculate the total number of pages
    $total_equipment = getTotalEquipment();
    $total_pages = (int) ceil($total_equipment / $equipment_per_page);
      

    // Make sure the current page is valid
    $page = (int) $page;

    if ($page < 1) {
      $page = 1;
    } elseif ($page > $total_pages) {
      $page = $total_pages;
    }


    // Calculate the next and previous pages
    $data['previous'] = $page == 1 ? null : $page - 1;
    $data['next'] = $page == $total_pages ? null : $page + 1;


    // Get the page of equipment
    try {

      $db = Database::getInstance();

      $offset = ($page - 1) * $equipment_per_page;

      $data['rental_pool_registration_records'] = $db->query("SELECT * FROM rental_pool_registration_records ORDER BY DateTime LIMIT $equipment_per_page OFFSET $offset")->fetchAll();

    } catch(PDOException $exception) {

      error_log($exception->getMessage());

      $data['rental_pool_registration_records'] = [];
    }

    return $data;
  }
?>