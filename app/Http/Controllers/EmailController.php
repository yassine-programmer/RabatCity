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
// Load Composer's autoloader
require '../vendor/autoload.php';

class EmailController extends Controller
{
    public function AlertDelete($journal, $user_id)
    {
        $user = User::find($user_id);
        $subject = 'Alerte de SUPPRESSION';
        $message = 'Le moderateur ' . $user->name . ' a effectue une <b>' . $journal->Journal_action . '</b> d un/une ' . $journal->Journal_table . ' sous le titre de : ' . $journal->Journal_intitule
            . '<br>Veuillez consulter le journal dans votre espace admin : <a href="https://emsipfa.tk/home">www.emsipfa.tk/home</a>';

        if ($user->role == 'moderator') {
            $admins = DB::table('users')->where('role', '=', 'admin')->get();

            foreach ($admins as $admin) {
                $this->SendEmail($admin->email, $subject, $message);
            }
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
                $mail->Username = 'rabat.no.reply1@gmail.com';                     // SMTP username
                $mail->Password = 'rabat123456';                               // SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('rabat.no.reply1@gmail.com', 'Rabat');
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
                $result = 'Y';
            } catch (Exception $e) {
                $result = "N";
            }
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
                'message' => 'nullable'
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
            $mail->Username = 'rabat.no.reply1@gmail.com';                     // SMTP username
            $mail->Password = 'rabat123456';                               // SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('rabat.no.reply1@gmail.com', 'Rabat');
            $mail->addAddress('rabat.no.reply1@gmail.com');     // Add a recipient
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
            $mail->Body = 'Nom  = ' . $name . '<br>Adresse Email: ' . $email . '<br>Message: ' . $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $result = 'Y';
        } catch (Exception $e) {
            $result = "N";
        }
        return redirect()->back()->with('result', $result);

    }

    // VERIFICATION
    public function sendVerificationCode($user_id) {
        $current_id =Auth::id();
      if ($user_id == $current_id){
        $user = User::find($user_id);
       if($user->confirmed){
           return 'alredy verfied page';
        }
        else {
            $random = rand(100000000,999999999);  // generating number of 9 digits
            $verification_code = 1000000000 + $random; // random number with 10 digits, the first digit for attempts verification
            // using code in database
            $user->confirmation_code = $verification_code;
            $user->save();
            // send email
            $domain = parse_url(request()->root())['host'];
            $link= $domain.'/verify/'.$user_id.'/'.$random;
            //
            $recepient= $user->email;
            $subject = 'Email de confirmation';
            $message ='<a href="'.$link.'" >'.$link.'</a>';
            $this->SendEmail($recepient, $subject, $message);
            return 'Email sent succesfully';
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
                    return 'Email verified';
                }
                else
                    return 'Account already verified';
            }
            else
                {$this->sendVerificationCode($user_id);
                return 'The verification link is not valid anymore due to multiple verification attempts, we automatically sent you another verification code, please verify your account using the new link';}
        }
        else{
            $user->confirmation_code += 1000000000;
            return 'Wrong verification link, try verifiying your account by generating a new verification link in your dashboard : <a href="/home"></a>';}
    }
}
