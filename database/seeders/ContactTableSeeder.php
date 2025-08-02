<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'Nada Amr',
                'email' => 'nada@example.com',
                'phone' => '01001234567',
                'subject' => 'Inquiry about services',
                'message' => 'Hi, I would like to know more about your offerings.',
            ],
            [
                'name' => 'Ali Mahmoud',
                'email' => 'ali@example.com',
                'phone' => '01122334455',
                'subject' => 'Feedback',
                'message' => 'Great work, keep it up!',
            ],
            [
                'name' => 'Sara Youssef',
                'email' => 'sara@example.com',
                'phone' => '01233445566',
                'subject' => 'Support request',
                'message' => 'I’m having trouble accessing my account.',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
