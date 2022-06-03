<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send()
    {
        $details = [
            'title' => 'Email dari saya',
            'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo quo maiores repudiandae doloremque veritatis maxime numquam reprehenderit ipsum voluptatem fugiat sed assumenda, blanditiis molestias magnam iusto exercitationem inventore deserunt corrupti?'
        ];

        try {
            Mail::to('bentarraharjax22@gmail.com')->send(new \App\Mail\TestMail($details));
            echo "Email Berhasil Dikirimkan";
        } catch (\Exception $e) {
            echo "Email gagal dikirim karena $e.";
        }
    }
}
