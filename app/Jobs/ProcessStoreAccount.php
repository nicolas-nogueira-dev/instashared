<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessStoreAccount implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $filename = $this->data['username'].'.txt';
      $content = $this->data['name'].'\n'.$this->data['email'].'\n'.$this->data['username'].'\n'.$this->data['title'].'\n'.$this->data['description'];
      $filepath = 'C:\Users\Nicolas\Desktop\STAGE\instashared\LOGS\log-'.$filename;
      $fp = fopen($filepath, "wb");
      fwrite($fp,$content);
      fclose($fp);

    }
}
