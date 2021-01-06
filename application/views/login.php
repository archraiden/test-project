<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dating App Website</title>

    <!-- Global stylesheets -->
    
    <link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/css/custom_css/custom_googlefont.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
    <!--SITE CUSTOM STYLE SHEET-->
    <link href="<?php echo base_url();?>assets/css/site_custom.css" rel="stylesheet" type="text/css">

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
    <!-- /theme JS files -->


</head>

<!-- <body class="bg-slate-800"> -->
<body >
    <!-- Page container -->
    <div class="page-container login-container" style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">
                    <?php //echo sha1('pw@1234  ');?>
                <!-- Advanced login -->
                <form id="login_pnl">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <!-- <img src="<?php echo base_url();?>assets/images/logo_white.png" alt="" height="163px" width="166px"> -->
                            <h5 class="content-group-lg">Dating App Login Portal<small class="display-block">Enter your account</small></h5>
                        </div>
                        
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" id="user_name" name="user_name" class="form-control required" placeholder="Username">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" id="user_pass" name="user_pass" class="form-control required" placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <button type="button" class="btn btn-success btn-block" id="login_btn" name="login_btn">Login <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                        
                        <div class="content-divider text-muted form-group">
                            <span>Can't remember your password?</span>
                        </div>
                        <a href="javascript:void(0);" id="pword_recover" class="btn btn-info btn-block content-group" data-toggle="modal" data-target="#password_modal">
                            Reset Password
                        </a>
                        
                        
                        <div class="content-divider text-muted form-group">
                            <span>Want to go back to our homepage?</span>
                        </div>
                        <a href="javascript:void(0);" id="back_btn" class="btn bg-slate btn-block content-group">Back</a>
                    
                        <span class="help-block text-center no-margin">For those who doesn't have access, please proceed to our librarian to assist you.</span>
                    </div>
                </form>
                <!-- /advanced login -->

            </div>
            <!-- /main content -->
            
            <!-- MODALS -->
            <div id="password_modal" class="modal fade" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" id = "pass_close_hdr" data-dismiss="modal">&times;</button>
                            <h6 class="modal-title">Reset Password</h6>
                        </div>

                        <form action="#" id="pass_form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>ID No.</label>
                                            <input type="text" id="user_id" name = "user_id" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>New Password</label>
                                            <input type="password" id="new_pass" name = "new_pass" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Confirm Password</label>
                                            <input type="password" id="conf_pass" name = "conf_pass" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" id = "pass_close_ftr" data-dismiss="modal">Close</button>
                            <button type="button" id="save_pass" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /page content -->


        <!-- Footer -->
        <div class="footer text-white text-muted">
            &copy; 2020 Dating App Website.
        </div>
        <!-- /footer -->

    </div>
    <!-- /page container -->

</body>
</html>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        base_url = '<?php echo base_url();?>';
        pass_modal="#password_modal .modal-content";
        
        //*LOGIN FUNCTION*//
        $('#login_btn').on('click',function(e){
            verify_login();
        });
        
        $('#back_btn').on('click',function(e){
            window.location = base_url;
        });
        
        jQuery.validator.setDefaults({
              debug: true,
              success: "valid"
        });
        
        /*
            ## FORM VALIDATION FOR REQUIRED FIELDS
        */
        form = $( "#login_pnl, #pass_form" );
        form.validate({ 
        ignore: 'input[type=hidden]', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        messages: {
            addInvoice: "This button is required."
        },
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        validClass: "validation-valid-label",
        success: function(label,validClass) {
             label.addClass(validClass);
             label.remove();
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        onError : function(){
            $('.input-group.error-class').find('.help-block.form-error').each(function() {
              $(this).closest('.input-group').addClass('error-class').append($(this));
            });
        }
        });
        
        $("#save_pass").on("click",function(e){
            new_pass_data();
        });
    });
    
    function verify_login(){
        

        var users = {
            user_name: $("#user_name").val(),
            user_pass:$("#user_pass").val()
        }

        var entries =  JSON.stringify(users);

        if(form.valid()){
            $.ajax({

                url: base_url+'login/user_login/',
                type: 'POST',
                data: $("#login_pnl").serialize(),
                // dataType: 'json',
                beforeSend: function(){
                    var block_title = 'Logging In';
                    block_loader(block_title);
                },
                error: function(xhr,err,opt){
                    sweet_err("Error on Logging In",xhr);
                    //console.clear();
                },
                success: function (json){
                    var obj = JSON.parse(json);
                    if(obj.status == 1){
                        eval(obj.link);
                    }
                    else{
                        sweet_err("Ooops!",obj.msg);
                    }
                },
                complete: function(){
                    $.unblockUI();
                    //console.clear();
                }
            });
        }
    }
    
    function new_pass_data(){
        $.ajax({
            url: base_url+'login/update_password/',
                type: 'POST',
                data: $("#pass_form").serialize(),
                dataType: 'json',
                beforeSend: function (){
                    var title = 'Resetting Password';
                    div_block_loader(pass_modal,title);
                },
                error: function(xhr,opt,msg){
                    $(pass_modal).unblock();
                    sweet_err('Database error!');
                },
                success:function(oData){
                    $(pass_modal).unblock();
                    if(oData.status == 0){
                        sweet_err(oData.msg);
                        
                    }
                    else{
                        sweet_succ(oData.msg);
                    }
                },
                complete: function(){
                    $(pass_modal).unblock();
                }
            
        });
    }
    
    function sweet_err(title,text){
        swal({
            title: title,
            text: text,
            confirmButtonColor: "#EF5350",
            type: "error"
        });
    }
    
    function sweet_succ(title,text){
         swal({
            title: title,
            text: text,
            confirmButtonColor: "#66BB6A",
            type: "success"
        });
    }
    
    function div_block_loader(div_id,msg){
         $(div_id).block({
            message: '<i class="icon-spinner4 spinner"></i>'+msg,
            overlayCSS: {
                backgroundColor: '#fff',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
    }
    
    function block_loader(title){
        $.blockUI({ 
            message: '<h4><i class="icon-spinner4 spinner"></i>&nbsp'+title+'</h4>',
            overlayCSS: {
                backgroundColor: '#1b2024',
                opacity: 0.8,
                cursor: 'wait'
            },
            css: {
                border: 0,
                color: '#fff',
                padding: 0,
                backgroundColor: 'transparent'
            }
        });
    }
</script>

