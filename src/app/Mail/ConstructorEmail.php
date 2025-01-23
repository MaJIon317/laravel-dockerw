<?php

namespace App\Mail;

use App\Models\User;
use App\Models\EmailConstructor;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConstructorEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $emailConstructor;

    /**
     * Create a new message instance.
     */
    public function __construct(User|string $user, EmailConstructor $emailConstructor) {
        $this->user = $user;
        $this->emailConstructor = $emailConstructor;

        $this->setSortcodes($this->emailConstructor->name, 'name');
        $this->setSortcodes($this->emailConstructor->text, 'text');
        $this->setSortcodes($this->emailConstructor->html, 'html');
    }

    public function setSortcodes(string|null $data, string|null $field): void
    {
        $data = Str::replace([
            '([email_constructor_id])',

            '([setting_name])',

            '([site_url])',

            '([customer_name])',
            '([customer_email])',
            '([email])',

            '([unsubscribe])'
        ], [
            $this->emailConstructor->id,

            config('settings.name'),

            config('app.url'),

            $this->user->name ?? __('Client'),
            !is_string($this->user) ? $this->user->email : $this->user,
            !is_string($this->user) ? $this->user->email : $this->user,

            route('unsubscribe')
        ], $data);

        $data = email_constructor_encrypt_utms($data);

        $this->emailConstructor->{$field} = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailConstructor->name,
            tags: explode(',', $this->emailConstructor->tags),
            metadata: [
                'constructor_id' => $this->emailConstructor->id,
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $content = [
            'html' => 'mail.constructor.html',
            'with' => [
                'text' => $this->emailConstructor->text,
                'html' => $this->emailConstructor->html
            ],
        ];

        if ($this->emailConstructor->text) {
            $content['text'] = 'mail.constructor.text';
        }

        return new Content(...$content);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
