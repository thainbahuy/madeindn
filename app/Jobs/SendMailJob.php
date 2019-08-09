<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;


    /**
     * SendMail constructor.
     * @param $template
     * @param $params array
     * @param $subject
     * @param $from
     * @param $name
     * @param $to
     */
    public function __construct($template, $params, $subject, $from, $name, $to)
    {
        $this->data = [
            'template' => $template,
            'params' => $params,
            'subject' => $subject,
            'from' => $from,
            'name' => $name,
            'to' => $to,
        ];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send($this->data['template'], $this->data['params'], function ($message) {
            $message->from($this->data['from'], $this->data['name']);
            $message->to($this->data['to'], $this->data['subject'])->subject($this->data['subject']);
        });

        Log::info('send mail reset password');
    }
}
