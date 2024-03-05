<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public static function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function paginate($items, $perPage = 5, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total   ,$perPage);
    }

    public function sendClientMails($data)
    {
        $clientname = $data->client;
        $name = $data->name;
        $email = $data->email;
        $phone = $data->phone;
        $msg = $data->msg;
        // $clientemailid = 'shyam@wmmsols.com, sayarabano036@gmail.com';
      $clientemailid = 'shubh26joshi333@gmail.com';
        $clientmailbody = 'Greeting!! '."\r\n".' We have recieved a new enquiry details mention as below: '."\r\n".' Name = '.$name. ' '."\r\n".'  Email = '.$email.' '."\r\n".' Phone Number = '.$phone.' '."\r\n".' Message = '.$msg.' '."\r\n".' Thanks ';
        $clientmailsubject = 'New Enquiry Recieved';
        $customermailbody = 'Dear '.$name.', '."\r\n".' We have recieved your enquiry, we will connect you to soon. '."\r\n".' Thanks & Regards '."\r\n".' '.$clientname;
        $customermailsubject = 'Thanks For Enquiry';
        Mail::to($clientemailid)->send(new SendMail($name,$email,$clientmailsubject,$clientmailbody));
    //   mail($clientemailid,$clientmailsubject,$clientmailbody);
        return Mail::to($email)->send(new SendMessageToEndUser($name,$customermailbody));
    //   mail($email,$customermailsubject,$customermailbody);
    }
}
