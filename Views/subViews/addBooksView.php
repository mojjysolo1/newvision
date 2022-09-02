<h3>Add New Book</h3>
<form id="addBooksForm" method="post" enctype="multipart/form-data">
  <div class="row p-1">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Book code</label>
      <input type="text" class="form-control" name="bk_code" id="bk_code" placeholder="Book code">
    </div>
    <div class="form-group col-md-7">
      <label for="bk_name">Book name</label>
      <input type="text" required class="form-control" name="bk_name" id="bk_name" placeholder="Book name">
    </div>
  </div>
  <div class="row p-1">
  <div class="form-group col-md-3">
      <label for="class">Class</label>
      <select id="class" name="class" required class="btn bg-transparent border" style='width:100%;'>
        <option value='' selected>Choose class</option>
        <option value='s.1'>S.1</option>
        <option value='s.2'>S.2</option>
        <option value='p.7'>P.7</option>
        <option value='p.5'>P.5</option>
        <option value='p.6'>P.6</option>
        <option value='p.7'>P.7</option>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="bk_price">Book Price</label>
      <input type="number" name="bk_price" required class="form-control" id="bk_price" placeholder="price">
    </div>
    <div class="form-group col-md-4">
      <label for="bk_gd_price">Teachers Guide Price</label>
      <input type="number" required class="form-control" name="bk_gd_price" id="bk_gd_price" placeholder="price">
    </div>
  </div>
 
  <div class="text-center p-2">
     <button type="submit" class="btn btn-primary w-25" onclick="submitForm(event,'addBooksForm','insert_books','loaderContent')">submit</button>
  </div>
</form>