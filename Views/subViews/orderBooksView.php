

<table class="table table-striped">
  <thead>
 <tr>
    <th scope='col' colspan='7' class='text-left text-info p-0'>Books<span class='text-success totalnum'> Total: <?=$tnum."/".$numRows; ?></span>
 </th>
  </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">SUBJECTS</th>
      <th scope="col">CLASS</th>
      <th scope="col">COST UGX</th>
      <th scope="col">TEACHER'S GUIDE</th>
      <th scope="col">ITEMS</th>
      <th scope="col">ORDER</th>
    </tr>
  </thead>
  <tbody>
    <?php

    $r=$startnum;
    $s=0;

       foreach($data_array as $vals){
        $oid=$vals['book_id'];
        $r++;

          echo "<tr>
          <th scope='row'>".$r."</th>
          <th>".$vals['bookname']."</th>
          <th>".ucfirst($vals['class'])."</th>
          <td>".$vals['bk_cost']."</td>
          <td>".$vals['bk_gd_cost']."</td>
          <td><input type='number' name='num_items' class='form-control w-50' id='num_items{$oid}' value='1'></td>

          <td>
            <label style='z-index:0;' class='list-group-item'>
            <input class='form-check-input me-1 chkbx' id='order_chkbx{$oid}' onclick=\"getOrders(jQuery('#num_items{$oid}').val());\" type='checkbox' value=''>
            Order
            </label>
        </td>
        </tr>";

        $s++;
     
        if($r>=$tnum){
            $buttonload="<div class='w-100' style='margin-left:40%;'><span id='Pbutton{$r}' onclick=\"loadnum=loadnum>defaultNum?loadnum-defaultNum:loadnum; startload=startload>0?startload-defaultNum:0; panelSelect('book_listings');\" class='btn btn-success' style='margin-top:5px;'>Prev</span>
            
            <span id='nbutton{$r}' onclick=\"loadnum+=defaultNum;startload=loadnum-defaultNum; panelSelect('book_listings');\" class='btn btn-success' style='margin-top:5px;'>Next</span> </div>

            <script>
            jQuery('.totalnum').html(' Total: $r/$numRows');
            jQuery('#nbutton{$r},#Pbutton{$r}').css('font-size','62%');
            </script>";

            break;
            }
            if($r==$numRows){
            $buttonload="<center class='w-100'><span id='Pbutton{$r}' onclick=\"loadnum=loadnum>defaultNum?loadnum-defaultNum:loadnum; startload=startload>0?startload-defaultNum:0; panelSelect('book_listings');\" class='btn btn-success' style=' margin-top:5px;'>Prev</span></center>
            <script>
            
            jQuery('.totalnum').html(' Total: $r/$numRows');
            jQuery('#nbutton{$r},#Pbutton{$r}').css('font-size','62%');
            </script>";
            break;	
            }
       }
    ?>
   
  </tbody>
  <tfoot class='bg-dark'>
<tr>
<td class='p-1'  colspan='6' ><?=$buttonload?></td>
<td class='p-1 text-light'   ><button class='btn btn-secondary border'>Order Items <span class="badge bg-primary rounded-pill num_orders">0</span></button></td>
</tr>
</tfoot>
</table>
</table>


<script>
feather.replace();
jQuery('[data-toggle="popover"]').popover({ html:true}); 
</script>