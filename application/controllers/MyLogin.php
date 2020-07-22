<?php
class MyLogin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('MyLoginModel','m');
	}
    public function index()
    {
    
        $this->load->view('user/login');

    }

    public function signupSave()
    {
        $data=$this->m->checkEmail();
        if($data > 0)
        {
            echo "Exist";
        }
        else
        {
            
                  $data=$this->m->signupSave();
        foreach($data as $row)
        {
             $id=$row->id;
            $name=$row->full_name;
            $user_id=$row->user_id;
            $email=$row->email;
            $cell=mobile_no;
            echo "<script>alert($row->full_name) </script>";
        
            
        $to = $email;
        $subject = 'Allied Tajar';
        $from = 'allied@alliedtajar.com';
 
        // To send HTML mail, the Content-type header must be set
          $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
        // Create email headers
          $headers .= 'From: '.$from."\r\n".
             'Reply-To: noreply@alliedtajar.com'."\r\n" .
             'X-Mailer: PHP/' . phpversion();
        
          // Compose a simple HTML email message
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[SUBJECT]</title>
    <style type="text/css">
        body {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }
        
        .tableContent img {
            border: 0 !important;
            display: block !important;
            outline: none !important;
        }
        
        a {
            color: #382F2E;
        }
        
        p,
        h1 {
            color: #382F2E;
            margin: 0;
        }
        
        p {
            text-align: left;
            color: #999999;
            font-size: 14px;
            font-weight: normal;
            line-height: 19px;
        }
        
        a.link1 {
            color: #382F2E;
        }
        
        a.link2 {
            font-size: 16px;
            text-decoration: none;
            color: #ffffff;
        }
        
        h2 {
            text-align: left;
            color: #222222;
            font-size: 19px;
            font-weight: normal;
        }
        
        div,
        p,
        ul,
        h1 {
            margin: 0;
        }
        
        .bgBody {
            background: #ffffff;
        }
        
        .bgItem {
            background: #ffffff;
        }
        
        @media only screen and (max-width:480px) {
            table[class="MainContainer"],
            td[class="cell"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="specbundle"] {
                width: 100% !important;
                float: left !important;
                font-size: 13px !important;
                line-height: 17px !important;
                display: block !important;
                padding-bottom: 15px !important;
            }
            td[class="spechide"] {
                display: none !important;
            }
            img[class="banner"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="left_pad"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }
        
        @media only screen and (max-width:540px) {
            table[class="MainContainer"],
            td[class="cell"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="specbundle"] {
                width: 100% !important;
                float: left !important;
                font-size: 13px !important;
                line-height: 17px !important;
                display: block !important;
                padding-bottom: 15px !important;
            }
            td[class="spechide"] {
                display: none !important;
            }
            img[class="banner"] {
                width: 100% !important;
                height: auto !important;
            }
            .font {
                font-size: 18px !important;
                line-height: 22px !important;
            }
            .font1 {
                font-size: 18px !important;
                line-height: 22px !important;
            }
        }
    </style>
    <script type="colorScheme" class="swatch active">
        { "name":"Default", "bgBody":"ffffff", "link":"382F2E", "color":"999999", "bgItem":"ffffff", "title":"222222" }
    </script>
</head>

<body paddingwidth="0" paddingheight="0" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
    <table bgcolor="#ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center" style="font-family:Helvetica, Arial,serif;">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" class="MainContainer">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td valign="top" width="40">&nbsp;</td>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <!-- =============================== Header ====================================== -->
                                                            <tr>
                                                                <td height="75" class="spechide"></td>

                                                                <!-- =============================== Body ====================================== -->
                                                            </tr>
                                                            <tr>
                                                                <td class="movableContentContainer " valign="top">
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="35"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" align="center" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable">
                                                                                                                <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;"><span class="specbundle2"><span class="font1">Welcome to&nbsp;</span></span>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable">
                                                                                                                <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#00a157;"><span class="font"><b>Allied</b> Tajar</span> </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                                            <tr>
                                                                                <td valign="top" align="center">
                                                                                    <div class="contentEditableContainer contentImageEditable">
                                                                                        <div class="contentEditable">
                                                                                            <img src="alliedtajar.com/portal/assets/images/line.png" width="251" height="43" alt="" data-default="placeholder" data-max-width="560">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                                            <tr>
                                                                                <td height="55"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="left">
                                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                                        <div class="contentEditable" align="center">
                                                                                            <h2>Dear, ';
                                                                                            
                                                                                             $message .= $name;
                                                                                            
                                                                                          $message .='  
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td height="15"> </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td align="left">
                                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                                        <div class="contentEditable" align="center">
                                                                                            <p>
                                                                                                A big thanks for signing up to our Web Application! You’re all set up, and will be getting the emails once per week. Your account will be approved in the next 24 hours. Moreover, you can contact us throught our WhatsApp No. +92 332 6775000.
                                                                                                <br></br><br></br>
                                                                                                Have questions? Get in touch with us via Facebook or Twitter, or email our support team.
                                                                                                <br></br><br></br>
                                                                                                <span style="color:#222222;">Cheers,</span>
                                                                                                <br></br>
                                                                                                <span style="color:#222222;">Team Allied Tajar</span><br></br>

                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td height="55"></td>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td align="center">
 <a target="_blank" href="alliedtajar.com/portal/index.php/MyLogin/verifyAccount/'.$user_id.'"><button style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding: 10px;background-color:#00A759;border: none;border-radius: 5px;color:white;
font-size: 16px;margin-bottom: 50px;">Verify Your Account</button></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <a target="_blank" href="alliedtajar.com"><img src="alliedtajar.com/portal/assets/images/logo.png" width="150" height="100" alt="Allied Tajar" data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="20"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="65">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-bottom:1px solid #DDDDDD;"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="25"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable" align="center">
                                                                                                                <p style="text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;">
                                                                                                                   
                                                                                                                     Copyright © 2019 Allied Biz Tech (Pvt) Ltd. All rights reserved. 
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td valign="top" width="30" class="specbundle">&nbsp;</td>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" width="52">
                                                                                                                        <div class="contentEditableContainer contentFacebookEditable">
                                                                                                                            <div class="contentEditable">
                                                                                                                                <a href="#"><img src="alliedtajar.com/portal/assets/images/facebook.png" width="52" height="53"  data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td valign="top" width="16">&nbsp;</td>
                                                                                                                    <td valign="top" width="52">
                                                                                                                        <div class="contentEditableContainer contentTwitterEditable">
                                                                                                                            <div class="contentEditable">
                                                                                                                    
                                                                                                    <a  href=""><img src="alliedtajar.com/portal/assets/images/twitter.png" width="52" height="53"  data-max-width="52" data-customIcon="true"></a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="88"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>

                                                                    <!-- =============================== footer ====================================== -->

                                                                    </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </td>
                                                    <td valign="top" width="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
            </tr>
        </tbody>
    </table>
</body>

</html>';
            // Sending email
        $mail=@mail($to, $subject, $message, $headers);
        if($mail){
         echo 'Your mail has been sent successfully.';
        } else{
        echo 'Unable to send email. Please try again.';
        }
        
        echo json_encode($data);
    }
        
            
        }
// echo $data;
      

    }
    
    
    
    public function verifyAccount($id)
    {
        $res=$this->m->verifyAccount($id);
        if($res == "Active")
        {
            redirect('/MyLogin/error');
        }
        else{
            foreach($res as $row)
            {
                  $user_name=$row->user_name;
                  $pass=$row->password;
                  $fname=$row->full_name;
                  $email=$row->email;
                
                
        $to = $email;
        $subject = 'Allied Tajar';
        $from = 'info@alliedtajar.com';
 
        // To send HTML mail, the Content-type header must be set
           $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
        // Create email headers
          $headers .= 'From: '.$from."\r\n".
             'Reply-To: '.'norepaly@gmail.com'."\r\n" .
             'X-Mailer: PHP/' . phpversion();
        
          // Compose a simple HTML email message
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[SUBJECT]</title>
    <style type="text/css">
        body {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 0 !important;
            margin: 0 !important;
            width: 100% !important;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
        }
        
        .tableContent img {
            border: 0 !important;
            display: block !important;
            outline: none !important;
        }
        
        a {
            color: #382F2E;
        }
        
        p,
        h1 {
            color: #382F2E;
            margin: 0;
        }
        
        p {
            text-align: left;
            color: #999999;
            font-size: 14px;
            font-weight: normal;
            line-height: 19px;
        }
        
        a.link1 {
            color: #382F2E;
        }
        
        a.link2 {
            font-size: 16px;
            text-decoration: none;
            color: #ffffff;
        }
        
        h2 {
            text-align: left;
            color: #222222;
            font-size: 19px;
            font-weight: normal;
        }
        
        div,
        p,
        ul,
        h1 {
            margin: 0;
        }
        
        .bgBody {
            background: #ffffff;
        }
        
        .bgItem {
            background: #ffffff;
        }
        
        @media only screen and (max-width:480px) {
            table[class="MainContainer"],
            td[class="cell"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="specbundle"] {
                width: 100% !important;
                float: left !important;
                font-size: 13px !important;
                line-height: 17px !important;
                display: block !important;
                padding-bottom: 15px !important;
            }
            td[class="spechide"] {
                display: none !important;
            }
            img[class="banner"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="left_pad"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }
        
        @media only screen and (max-width:540px) {
            table[class="MainContainer"],
            td[class="cell"] {
                width: 100% !important;
                height: auto !important;
            }
            td[class="specbundle"] {
                width: 100% !important;
                float: left !important;
                font-size: 13px !important;
                line-height: 17px !important;
                display: block !important;
                padding-bottom: 15px !important;
            }
            td[class="spechide"] {
                display: none !important;
            }
            img[class="banner"] {
                width: 100% !important;
                height: auto !important;
            }
            .font {
                font-size: 18px !important;
                line-height: 22px !important;
            }
            .font1 {
                font-size: 18px !important;
                line-height: 22px !important;
            }
        }
    </style>
    <script type="colorScheme" class="swatch active">
        { "name":"Default", "bgBody":"ffffff", "link":"382F2E", "color":"999999", "bgItem":"ffffff", "title":"222222" }
    </script>
</head>

<body paddingwidth="0" paddingheight="0" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
    <table bgcolor="#ffffff" width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center" style="font-family:Helvetica, Arial,serif;">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff" class="MainContainer">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td valign="top" width="40">&nbsp;</td>
                                                <td>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <!-- =============================== Header ====================================== -->
                                                            <tr>
                                                                <td height="75" class="spechide"></td>

                                                                <!-- =============================== Body ====================================== -->
                                                            </tr>
                                                            <tr>
                                                                <td class="movableContentContainer " valign="top">
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                    
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="35"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" align="center" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable">
                                                                                                                <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#222222;"><span class="specbundle2"><span class="font1">Welcome to&nbsp;</span></span>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable">
                                                                                                                <p style="text-align:center;margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#00a157;"><span class="font"><b>Allied</b> Tajar</span> </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                                            <tr>
                                                                                <td valign="top" align="center">
                                                                                    <div class="contentEditableContainer contentImageEditable">
                                                                                        <div class="contentEditable">
                                                                                            <img src="alliedtajar.com/portal/assets/images/line.png" width="251" height="43" alt="" data-default="placeholder" data-max-width="560">
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                                                                            <tr>
                                                                                <td height="55"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="left">
                                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                                        <div class="contentEditable" align="center">
                                                                                            <h2>Dear, ';
                                                                                            
                                                                                             $message .= $fname;
                                                                                             
                                                                                          $message .='  
                                                                                            </h2>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td height="15"> </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td align="left">
                                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                                        <div class="contentEditable" align="center">
                                                                                                 <p>
                                                                                                Hurraaah! You have successfully completed your verification process. Now you can login by using the following login details below:
                                                                                                <br></br> <br></br>
                                                                                                <b>User Name: </b>'; 
                                                                                               
                                                                                             $message .= $user_name;

                                                                                            
                                                                                          $message .='
                                                                                                
																								<br></br><br></br>
																								<b>Password: </b>';
																								   $message .= $pass;
                                                                                             
                                                                                                   $message .='<br></br><br></br>';
                                                                                                   
                                                                                                   $message .='<a target="_blank" href="alliedtajar.com/portal/"><button style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding: 10px;background-color:#00A759;border: none;border-radius: 5px;color:white;
font-size: 16px;margin-bottom: 50px;">Click Here to Login</button></a>';
																								
                                                                                                   $message .='
                                                                                                
                                                                                                <br></br>
																								To downlaod our "Allied Tajar" android application click the button below,
                                                                                                <br></br><br></br>
																								<a heref="http://alliedtajar.com/apk"><button style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding: 10px;background-color:#00A759;border: none;border-radius: 5px;color:white;font-size: 16px;margin-bottom: 15px;">Download</button></a>
                                                                                                <br></br><br></br>
                                                                                                <span style="color:#222222;">Cheers,</span>
                                                                                                <br></br>
                                                                                                <span style="color:#222222;">Team Allied Tajar</span><br></br>

                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td height="55"></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td align="center">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                             <a target="_blank" href="#"><img src="alliedtajar.com/portal/assets/images/logo.png" width="150" height="100" alt="Allied Tajar" data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td height="20"></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="65">
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="border-bottom:1px solid #DDDDDD;"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="25"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <div class="contentEditableContainer contentTextEditable">
                                                                                                            <div class="contentEditable" align="center">
                                                                                                                <p style="text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;">
                                                                                                                   
                                                                                                                     Copyright © 2019 Allied Biz Tech (Pvt) Ltd. All rights reserved. 
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td valign="top" width="30" class="specbundle">&nbsp;</td>
                                                                                                    <td valign="top" class="specbundle">
                                                                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td valign="top" width="52">
                                                                                                                        <div class="contentEditableContainer contentFacebookEditable">
                                                                                                                            <div class="contentEditable">
                                                                                                                                <a href="#"><img src="alliedtajar.com/portal/assets/images/facebook.png" width="52" height="53"  data-default="placeholder" data-max-width="52" data-customIcon="true"></a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                    <td valign="top" width="16">&nbsp;</td>
                                                                                                                    <td valign="top" width="52">
                                                                                                                        <div class="contentEditableContainer contentTwitterEditable">
                                                                                                                            <div class="contentEditable">
                                                                                                                                <a  href="#"><img src="alliedtajar.com/portal/assets/images/twitter.png" width="52" height="53"  data-max-width="52" data-customIcon="true"></a>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="88"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>

                                                                    </div>

                                                                    <!-- =============================== footer ====================================== -->

                                                                    </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    </td>
                                                    <td valign="top" width="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
            </tr>
        </tbody>
    </table>
</body>

</html>';
            // Sending email
        $mail=@mail($to, $subject, $message, $headers);
        if($mail){
         redirect('/MyLogin/message');
        } else{
        echo 'Unable to send email. Please try again.';
        }
        
    }
            }
       
        }
     public function message()
    {
        $this->load->view('user/thanksMsg');
    }
    
    public function error()
    {
        $this->load->view('user/errorMsg');
    }

    public function login()
    {
          $user_name=$this->input->post('user_name');
          $pass=$this->input->post('password');
       
        $res=$this->m->login($user_name,$pass);
        if($res)
        {
            foreach($res AS $row)
            $sess_data = array(
                'login' => TRUE,
                'user_name' => $row->username,
                'user_id' => $row->id
            );
            	$this->session->set_userdata($sess_data);
				redirect("Home");
        }
       else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong User Name or Password!</div>');
				redirect('MyLogin/index');
			}
    }
    public function mySignup()
    {
        $this->load->view('user/SignUpView');
    }
    
    public function insert_user()
    {	
        $this->form_validation->set_rules('fname', 'First Name',                 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name',                 'trim|required');
         $this->form_validation->set_rules('user_name', 'User Name',                 'trim|required');
          $this->form_validation->set_rules('email', 'Email',                 'trim|required');
          $this->form_validation->set_rules('password', 'Password',                 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->load->view('user/SignUpView');
        }
        else
        {
             $pass1=$this->input->post('password');
             $pass2=$this->input->post('conf_pass');
             $user_name=$this->input->post('user_name');
             $email=$this->input->post('email');
            
            
            $res=$this->m->get_user($user_name,$email);
            if($res)
                
            {     
                  $msg="This User name or email already exist!";
                  $this->load->view('user/SignUpView',['msg'=>$msg]);
                //redirect('MyLogin/mySignup',['msg'=>"hy boss"]);
               /* echo '<div class="alert alert-danger text-center">This User Name or email already exist!</div>';
               	redirect('MyLogin/mySignup');*/
                
            }
            else
            {
            if($pass1 == $pass2)
            {
                    $res=$this->m->insert_user();
                    $msg="Your Account created successfully!";
		            $this->load->view('user/MyLoginView',['msg'=>$msg]);
                    }
                    else
                    {        
                  $msg="Must match the previous entry!";
                  $this->load->view('user/SignUpView',['msg'=>$msg]);
                    }
        }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
		redirect('MyLogin/index');
    }
    public function myTest()
    {
        $this->load->view('myTest');
    }
    public function forgottPassword()
    {
        $this->load->view('forgottPassword');
    }
    
    public function sendPassword()
    {
       
        $to = 'salmanrazabwn@gmail.com';
        $subject = 'Allied Tajar';
        $from = 'peterparker@email.com';
 
        // To send HTML mail, the Content-type header must be set
           $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
        // Create email headers
         $headers .= 'From: '.$from."\r\n".
             'Reply-To: '.$from."\r\n" .
             'X-Mailer: PHP/' . phpversion();
 
  
    
 
        // Sending email
        $mail=@mail($to, $subject, $message, $headers);
        if($mail){
         echo 'Your mail has been sent successfully.';
        } else{
        echo 'Unable to send email. Please try again.';
        }
        
        
        // @mail($user_email,$subject,$message,$from);
        
    }
}
