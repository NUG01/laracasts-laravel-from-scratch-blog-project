<?php



namespace App\services;

use MailchimpMarketing\ApiClient;

class Newsletter2 {
  public function subscribe(string $email,string $list=null){
   $list??=config('services.mailchimp.lists.subscribers');
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us9'
    ]);

   return  $this->client()->lists->addListMember($list,[
      'email_address'=>$email,
      'status'=>'subscribed'
  ]);
  }

  protected function client(){
    $mailchimp=new ApiClient();

    return $mailchimp->setConfig([
      'apikey'=>config('services.mailchimp.key'),
      'server'=>'us9'
    ]);
  }
}