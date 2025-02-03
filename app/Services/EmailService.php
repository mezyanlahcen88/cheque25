<?php
namespace App\Services;


use App\Mail\SendQuoteMail;
use Illuminate\Http\Request;
use App\Mail\SendContactMail;
use App\Mail\SendAdminQuoteMail;
use App\Mail\sendAdminContactMail;
use App\Mail\sendClientContactMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailForgotPassword;
use Illuminate\Support\Facades\Config;
use Modules\Setting\App\Models\Setting;

class EmailService
{

    /**
     * RETURN THE EMAIL CONFIGURATION
     *
     * @return void
     */
    private function setMailConfig($address = null,$name = null)
    {
        $setting = getSettings();
        $address = $address != null ? $address : getSettings()['sender_default_email'];
        $name = $name != null ? $name : getSettings()['sender_default_name'];
        $config = [
            'driver' => getSettings()['protocol'],
            'host' => getSettings()['host'],
            'port' => getSettings()['port'],
            'from' => ['address' => $address, 'name' => $name],
            'encryption' => getSettings()['encryption'],
            'username' => getSettings()['username'],
            'password' => getSettings()['password'],
        ];
        Config::set('mail', $config);
        return true;
    }




     /**
     * METHOD TO SEND CONTACT EMAIL TO ADMIN
     *
     * @param Request $request
     * @return void
     */
    public function sendAdminContactMail(string $email,array $emailData,$contatEmail,$contactName)
    {
        $this->setMailConfig($contatEmail,$contactName);
        return  Mail::to($email)->send(new sendContactMail($emailData));


    }


         /**
     * METHOD TO SEND CONTACT EMAIL TO ADMIN
     *
     * @param Request $request
     * @return void
     */
    public function sendEmailForgotPassword(string $email,$data,$contatEmail,$contactName)
    {
        $this->setMailConfig($contatEmail,$contactName);
        return  Mail::to($email)->send(new SendEmailForgotPassword($data));


    }
}


//use this in controller and call it inside function
//$this->sendClientContactMail($request->contact['name'], $request->contact['email'],$requestcontact);

// public function sendClientContactMail($name ,$email,$contact)
// {
//     $mailData = [
//         'name' => $name,
//         'email' => $email,
//         'contact' => $contact,
//     ];
//     $this->emailService->sendClientContactMail($email,$mailData,getSettings()['sender_default_email'],getSettings()['sender_default_name']);
//     return response()->json(['success' => true]);
// }
