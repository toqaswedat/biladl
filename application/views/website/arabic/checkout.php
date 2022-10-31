<!-- Page Header Start -->
<div class="page-header" style="background: url(<?=base_url('assets/website/img/banner1.jpg');?>);">
<div class="container">
  <div class="row">         
    <div class="col-md-12">
      <div class="breadcrumb-wrapper">
        <h2 class="product-title">Checkout</h2>
        <ol class="breadcrumb">
          <li><a href="<?=base_url();?>"><i class="ti-home"></i> Home</a></li>
          <li class="current">Checkout</li>
        </ol>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Page Header End -->        

<!-- Main container Start -->  
<div class="about section">
<div class="container content">
  <div class="row">   
    <div class="col-md-12">
		<blockquote><b>Order Details</b></blockquote>
        <div class="table-responsive">          
          <table class="table">
            <thead>
              <tr>
                <th>Membership type</th>
                <th>Duration</th>
                <th>Cost</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $package_details->title;?></td>
                <td><?php echo $package_details->total_days;?> DAYS</td>
                <td><?php echo $package_details->price;?> SAR</td>
              </tr>
            </tbody>
          </table>
          </div>
        <h3>Grand Total: <?php echo $package_details->price;?> SAR</h3>
       	<blockquote style="margin-top: 50px; margin-bottom: 30px;"><b>Payment Mode</b></blockquote>
        <?php echo form_open('checkout/submit');?>
        <div class="col-sm-3">
        <label class="container1">
        Sadad Bills
          <input type="radio" checked="checked" name="payment" value="Sadad">
          <span class="checkmark"></span>
        </label>
        </div>
        
        <div class="col-sm-3">
        <label class="container1">Visa
          <input type="radio" name="payment" value="Visa">
          <span class="checkmark"></span>
        </label>
        </div>
        <div class="col-sm-6">
        <label class="container1">Master
          <input type="radio" name="payment" value="Master">
          <span class="checkmark"></span>
        </label>
        </div>
        
        <button class="btn btn-common log-btn" style="margin-top: 30px;">Pay Now </button>
        <?php echo form_close();?>
    </div>
  </div>
</div>
</div>
</div>