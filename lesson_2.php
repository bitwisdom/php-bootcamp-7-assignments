<?php

$db = new PDO('mysql:host=localhost;dbname=phpbootcamp;', 'root', 'root');

$departments = array();

$results = $db->query("SELECT * FROM department ORDER BY name");
foreach ($results as $department) {
  $departments[$department['id']] = $department['name'];
}

$department_members = array();
$results = $db->query("SELECT p.lname, p.fname, m.department_id, m.is_manager 
    FROM personnel p 
    INNER JOIN department_members m ON p.id = m.personnel_id 
    ORDER BY p.lname, p.fname");
foreach ($results as $member) {
  $department_members[$member['department_id']][] = $member;
}

//var_dump($departments);
//var_dump($department_members);

?>
<html>
    <head><title>Personnel List</title></head>
    <body>
        <?php foreach ($departments as $department_id => $department_name): ?>
          <h2><?php print $department_name; ?></h2>
          <?php foreach ($department_members[$department_id] as $member): ?>
            <div>
              <?php print $member['lname']; ?>, <?php print $member['fname']; ?>
                <?php if (!empty($member['is_manager'])): ?>
                   (Manager)
                <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
    </body>
</html>