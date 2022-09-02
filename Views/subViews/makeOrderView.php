<h3>Make Order</h3>
<form id="orderForm" method="post" enctype="multipart/form-data">

  <div class="row p-1">
        <div class="form-group col-md-7">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Full Names</label>
                    <input type="text" required class="form-control" name="names" id="bk_code" placeholder="Enter Names">
                 </div>
                 <div class="form-group col-md-6">
                    <label for="bk_name">Email</label>
                    <input type="email" required class="form-control" name="email" id="bk_name" placeholder="Email">
                 </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="bk_name">Phone Number</label>
                    <input type="text" required class="form-control" name="phone" id="bk_name" placeholder="Phone">
                </div>
                 <div class="form-group col-md-7">
                    <label for="bk_price">Desired Delivery Location</label>
                     <input type="text" name="place" required class="form-control" id="bk_price" placeholder="location">
                 </div>
            </div>

            <div class="row">
 
                <div class="form-group col-md-8">
                    <label for="exampleFormControlTextarea1">Comment</label>
                    <textarea name="comment" placeholder="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>

        </div>


        <div class="form-group col-md-5">

                <table class="table table-secondary table-stripped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Book</th>
                            <th>Class</th>
                            <th>Items</th>
                            <th>Cost UGX</th>
                            <th>Guide UGX</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $r=1;
                    $sum_all=array();
                        foreach($data_array as $vals){

                            $num_items=$book_order[$vals['book_id']];
                            $totalSum=($num_items*$vals['bk_cost'])+($num_items*$vals['bk_gd_cost']);
                            $sum_all[]=$totalSum;

                            echo "<tr style='display:none;'>
                                   <td><input type='hidden' name='book_orders[]' value='".$vals['book_id'].'/'.$book_order[$vals['book_id']]."'></td>
                                </tr>";

                            echo "<tr>
                            <td>".$r."</td>
                            <td>".$vals['bookname']."</td>
                            <td>".$vals['class']."</td>
                            <td>".$num_items."</td>
                            <td>".defaultNumberFormat($vals['bk_cost'])."</td>
                            <td>".defaultNumberFormat($vals['bk_gd_cost'])."</td>
                            <td>".defaultNumberFormat($totalSum)."</td>
                            </tr>";
                            $r++;
                        }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="5"><strong>Total Price <?= numberCurrencyFormat(array_sum($sum_all))?> </strong></td>
                        </tr>
                    </tfoot>
                </table>
        </div>
       
   </div>
   
 
  <div class="text-center p-2">
     <button type="submit" class="btn btn-primary w-25" onclick="submitForm(event,'orderForm','insert_order','loadercontent')">submit</button>
  </div>
</form>