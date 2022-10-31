<style>
    .contact-form{
    background: #fff;
    margin-top: 5%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 10%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 5%;
    margin-top: -10%;
    text-align: center;
    color: #9b8200;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #e6bf02;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #e6bf02;
    border: none;
    cursor: pointer;
}
</style>
<div class="container contact-form">
            <div class="contact-image">
                <img src="<?=base_url();?>assets/website/img/contact-send.png" alt="Mail Enquiry"/>
            </div>
            
            <form method="post">
                <h3>اتصل بنا</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" required="" name="txtName" class="form-control" placeholder="اسمك *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="بريدك الالكتروني *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="رقم تليفونك *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" id="alert" name="btnSubmit" class="btnContact pull-right" value="إرسال رسالة" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="رسالتك *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>


<script>
    $(document).ready(function(){
        $("#alert").click(function(){
            alert('في محطة للحافلات');
        });
    });

</script>