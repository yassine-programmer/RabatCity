<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function AlertDelete($journal,$user_id){
        $user =  User::find($user_id);
        $subject='Alerte de SUPPRESSION';
        $message='Le moderateur '.$user->name.' a effectue une <b>'. $journal->Journal_action.' d un/une </b>'.$journal->Journal_table.' sous le titre de : '.$journal->Journal_intitule
        .'<br>Veuillez consulter le journal dans votre espace admin : <a href="https://emsipfa.tk/home">www.emsipfa.tk/home</a>';

        if($user->role == 'moderator'){
            $admins = DB::table('users')->where('role', '=', 'admin')->get();

            foreach ($admins as $admin){
                $this->SendAlertEmail($admin->email,$subject,$message);
            }
        }


    }
    public function SendAlertEmail($recepient,$subject,$message){
        {

            // mail config
            $mail = new PHPMailer(true);
            try {
                //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   =  true;                                   // Enable SMTP authentication
                $mail->Username   = 'rabat.no.reply1@gmail.com';                     // SMTP username
                $mail->Password   = 'rabat123456';                               // SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

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
                $mail->Body    = $message;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $result = 'Y';
            } catch (Exception $e) {
                $result = "N";
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'message' => 'nullable'
            ]
        );
        $name=$request->input('name');
        $email=$request->input('email');
        $message=$request->input('message');
        // mail config
        $mail = new PHPMailer(true);
        try {
            //Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'rabat.no.reply1@gmail.com';                     // SMTP username
            $mail->Password   = 'rabat123456';                               // SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

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
            $mail->Subject = 'Contact Rabat ('.$name.')';
            $mail->Body    = 'Nom  = '.$name.'<br>Adresse Email: '.$email.'<br>Message: '.$message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $result = 'Y';
        } catch (Exception $e) {
            $result = "N";
        }
        return redirect()->back()->with('result',$result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
