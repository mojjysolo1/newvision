

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">SUBJECTS</th>
      <th scope="col">CLASS</th>
      <th scope="col">COST UGX</th>
      <th scope="col">TEACHER'S GUIDE</th>
      <th scope="col">ACTION</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $r=1;
       foreach($data_array as $vals){
          echo " <tr>
          <th scope='row'>".$r."</th>
          <th>".$vals['bookname']."</th>
          <th>".ucfirst($vals['class'])."</th>
          <td>".$vals['bk_cost']."</td>
          <td>".$vals['bk_gd_cost']."</td>
          <td><button class='btn btn-primary'>Edit</button></td>
          <td><button class='btn btn-secondary'>Delete</button></td>
        </tr>
      ";
      $r++;
       }
    ?>
   
  </tbody>
</table>