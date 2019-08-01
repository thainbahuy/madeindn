<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Models\Web\Customer;
use App\Mail\WelcomeEmail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $post;
    public function __construct(Customer $post)
    {
       $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data= array(
            'email'=> $this->post->email_customer,
            'mobile'=> $this->post->phone_customer,
            'content_text' => $this->post->content_customer,
            'product_id' => $this->post->product_id,
            'date' => date('d/m/Y - H:i:s'),
        );
        Mail::send('mail', $data, function($message){
            $message->from('congthongtindue@gmail.com','Khách Hàng Liên Lạc');
            $message->to('nghia97dn@gmail.com', $this->post->email_customer)->subject($this->post->email_customer);
        });
    }
}
