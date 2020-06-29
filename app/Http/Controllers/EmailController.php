<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\User;
use DB;
use App\Newsletter;
use Illuminate\Support\Facades\Redirect;
// Load Composer's autoloader
require '../vendor/autoload.php';
use App\Rules\Captcha;

class EmailController extends Controller
{
    public function emailTemplate($contenue){
        $domain = parse_url(request()->root())['host'];
        $link= 'https://www.'.$domain;
        $message ='
            <div style="display: block;height: 100%!important;width: 100%!important;">
                 <center>
                     <div>
                        <table cellspacing="0" cellpadding="0" border="0" style="display: table-row-group;
                                                                                        vertical-align: middle;
                                                                                        border-color: inherit;
                                                                                        height: 100%!important;
                                                                                        width: 100%!important;">
                          <tr style="display: table-row;vertical-align: inherit;border-color: inherit;height: 100%!important;
                                                                                                       width: 100%!important;">
                            <th width="600" style="background-color: #f8f8f8;
                                                    border-bottom: 1px solid #ddd;
                                                    color: #505050;
                                                    font-family: Helvetica;
                                                    font-size: 20px;
                                                    font-weight: 700;
                                                    line-height: 100%;
                                                    text-align: left;
                                                    vertical-align: middle;
                                                    padding: 20px;
                                                    text-align: center">
                                <a href="'.$link.'">
                                    <img src="https://yassinedrive.blob.core.windows.net/rabatcitycontainer/LogoMakr_5AoF95.png" >
                                </a>
                            </th>
                          </tr>
                          <tr>  
                            <td width="600" style="padding: 20px;">
                                '.$contenue.'
                            </td>
                          </tr>
                        </table>
                     </div>   
                 </center>
            </div>
';
        return $message;

    }
    public function Alert($journal, $user)
    {
        $subject = 'Alerte : '.strtoupper($journal->Journal_action);
        $contenue = '
                <h2 style="text-decoration: underline">Action :</h2>
                <b>Role : </b> '.$user->role .'.<br>
                <b>Utilisateur : </b> ' . $user->name . '.<br>
                <b>Action : </b> ' . $journal->Journal_action . '<br>
                <b>Table : </b> ' . $journal->Journal_table . '.<br> 
                <b>Intitule : </b>' . $journal->Journal_intitule.'.<br>
                <br>
                Veuillez consulter le journal dans votre espace admin pour plus de detail : <a href="https://emsipfa.tk/home" style="text-decoration:none;background-color:#005ebb;display:inline-block;border-radius:3px;color:#fff;font-weight:bold;padding:5px 10px;font-size:12px">Rabat-City</a>
                <br>
                <p style="color: grey;font-size: 12px;text-align: center" >
                                    Copyright © Rabat-City, All rights reserved.
                </p>
';
        $message = $this->emailTemplate($contenue);

        $admins = DB::table('users')->where('role', '=', 'admin')->get();
        foreach ($admins as $admin)
        {
            if ($admin->Admin_notify)
            $this->SendEmail($admin->email, $subject, $message);
        }
    }

    public function SendEmail($recepient, $subject, $message)
    {
        {

            // mail config
            $mail = new PHPMailer(true);
            try {
                //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = env("EMAIL_USERNAME");                     // SMTP username
                $mail->Password = env("EMAIL_PASSWORD");                               // SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom(env("EMAIL_USERNAME"), 'Rabat');
                $mail->addAddress($recepient);     // Add a recipient
                ////    $mail->addAddressB('ellen@example.com');               // Name is optional
                //    $mail->addReplyTo('info@example.com', 'Information');
                //    $mail->addCC('cc@example.com');
                //    $mail->addBCC('bcc@example.com');

                // Attachments
                //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $result = true;
            } catch (Exception $e) {
                $result = false;
            }
            return $result;
        }
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'message' => 'nullable',
                'g-recaptcha-response' => new Captcha()
            ]
        );
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        // mail config
        $mail = new PHPMailer(true);
        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = env("EMAIL_USERNAME");                     // SMTP username
            $mail->Password = env("EMAIL_PASSWORD");                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom(env("EMAIL_USERNAME"), 'Rabat');
            $mail->addAddress(env("EMAIL_USERNAME"));     // Add a recipient
            ////    $mail->addAddressB('ellen@example.com');               // Name is optional
            //    $mail->addReplyTo('info@example.com', 'Information');
            //    $mail->addCC('cc@example.com');
            //    $mail->addBCC('bcc@example.com');

            // Attachments
            //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Contact Rabat (' . $name . ')';
            $contenue = '
            <h1 style="text-decoration: underline; text-align: center">Contact : </h1>
            <pre><b style="font-size: 20px;">Nom       : </b> ' . $name . '<br></pre>
            <pre><b>Emetteur  : </b> ' . $email . '<br><br> </pre>
            <pre><b>Message   : </b><br></pre>
            <p style="color: #0c2e5f;text-align: center;font-size: 17px;font-weight: 900;">' . $message.'</p>
            <p style="color: grey;font-size: 12px;text-align: center" >
                                    Copyright © Rabat-City, All rights reserved.
                </p>    
            ';
            $mail->Body = $this->emailTemplate($contenue);
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $result = 'Y';
        } catch (Exception $e) {
            $result = $e;
        }
        return redirect()->back()->with('result', $result);

    }

    // VERIFICATION
    public function sendVerificationCode($user_id) {
        $current_id =Auth::id();
      if ($user_id == $current_id){
        $user = User::find($user_id);
       if($user->confirmed){
           return view('email.alreadyVerified');
        }
        else {
            $random = rand(100000000,999999999);  // generating number of 9 digits
            $verification_code = 1000000000 + $random; // random number with 10 digits, the first digit for attempts verification
            // using code in database
            $user->confirmation_code = $verification_code;
            $user->save();
            // send email
            $domain = parse_url(request()->root())['host'];
            $link= 'https://www.'.$domain.'/verify/'.$user_id.'/'.$random;
            $utilisateur = Auth::user()->name ;
            //
            $recepient= $user->email;
            $subject = 'Email de confirmation';
            $contenue = '
                                <h2 style="text-decoration: underline">Confirmation :</h2>
                                Cher '.$utilisateur.',
                                <br>
                                Merci de vous etre inscrit sur notre site Rabat-City.
                                <br><br>
                                <div style="color: #856404;background-color: #fff3cd;border-color: #ffeeba;text-align: center">
                                Veuillez cliquer sur le lien ci-dessous pour activer votre inscription:
                                </div>
                                <br>
                                <div style="align-items: center; text-align: center" >
                                 <a href="'.$link.'" style="text-decoration:none;background-color:#005ebb;display:inline-block;border-radius:3px;color:#fff;font-weight:bold;padding:5px 10px;font-size:12px">Activation </a>
                                </div>
                               
                                <p style="font-size: 16px">
                                    Lorsque vous visitez le lien ci-dessus, votre compte sera activer.
                                    <br>
                                    Rabat-City - Portail de la ville Rabat.
                                </p>
                                <p style="color: grey;font-size: 12px;text-align: center" >
                                    Copyright © Rabat-City, All rights reserved.
                                </p>
            ';
            $message =$this->emailTemplate($contenue);
            if($this->SendEmail($recepient, $subject, $message))
             return back()->with('email_sent', 'true');
            else
             return back()->with('email_failed', 'true');
        }
      }
    }
    public function verify($user_id,$code){
        $user=User::find($user_id);
        $clean_code =substr(strval($user->confirmation_code),1) ; // getting the verification code from DB without the first digit
        if($clean_code == $code){
            if(strval($user->confirmation_code)[0] < '9') // checking if the user still have more attempts (max : 8)
            {
                if (!$user->confirmed) {
                    $user->confirmed = true;
                    $user->save();
                    return view('email.verificationSuccess');
                }
                else
                    return view('email.alreadyVerified');
            }
            else
                {$this->sendVerificationCode($user_id);
                return view('email.codeExpire');}
        }
        else{
            $user->confirmation_code += 1000000000;
            return view('email.verificationFail');}
    }
    public function NotifySubs($article){
        $Subs=Newsletter::all();
        $content = '                        <!-- content-->
                        <div style="text-align: center; border-style: dashed">
                            <div style="background-color: #f8f8f8;">
                            <a href="#">
                                <img style=\'max-width: 366px;min-width: 366px;\' src="'.$article->Article_image.'" >
                            </a>
                            </div>
                            <p style="font-weight: bold;font-size: 22px;">
                                <u>'.$article->Article_titre.'</u>
                            </p>
                            <p>'.$article->Article_text.'</p>
                        </div>
                        <p style="color: grey;font-size: 12px;text-align: center" >
                            Copyright © Rabat-City, All rights reserved.
                        </p>
                        <!-- end content -->
';
        $content = $this->emailTemplate($content);
        foreach ($Subs as $sub){
            $this->SendEmail($sub->Subscriber_email,'RabatCity: '.$article->Article_titre,$content);
        }
    }
}
