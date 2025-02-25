<?php
  include('./dbConnection.php');
  // Header Include from mainInclude 
  include('./mainInclude/header.php'); 
  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
 
  // following files need to be included
  

?>  
   <div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
     <div class="row">
       <img src="./image/coursebanner.jpg" alt="courses" style="height:300px; width:100%; object-fit:cover; box-shadow:10px;"/>
     </div> 
   </div> <!-- End Course Page Banner -->
   <div class="container">
     <h2 class="text-center my-4">Payment Status </h2>
     <form method="post" action="">
     <div class="form-group row">
        <label class="offset-sm-3 col-form-label">Order ID: </label>
        <div>
          <input class="form-control mx-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
        </div>
        <div>
          <input class="btn btn-primary mx-4" value="View" type="submit"	onclick="">
        </div>
      </div>
     </form>
    </div>
    <div class="container">
    <?php
      if (isset($responseParamList) && count($responseParamList)>0 )
      { 
        $sql = "SELECT order_id FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          if($responseParamList["ORDERID"] == $row["order_id"]){ ?>
            <div class="row justify-content-center">
              <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                  <tbody>
                    <?php
                      foreach($responseParamList as $paramName => $paramValue) {
                        if(($paramName == "TXNID") || ($paramName == "ORDERID") || ($paramName == "TXNAMOUNT") || ($paramName == "STATUS")){ ?>
                      <tr >
                        <td><label><?php echo $paramName?></label></td>
                        <td><?php echo $paramValue?></td>
                      </tr>
                      <?php } }?>
                      <tr>
                        <td></td>
                          <td><button class="btn btn-primary" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php
      } } } ?>

    </div>  
<div class="mt-5">
<?php 
  // Contact Us
  include('./contact.php'); 
?> 
</div>

<?php 
  // Footer Include from mainInclude 
  include('./mainInclude/footer.php'); 
?>  
