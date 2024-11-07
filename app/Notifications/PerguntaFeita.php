<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Perguntas as Pergunta;
class PerguntaFeita extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $pergunta;

    public function __construct(Pergunta $pergunta)
    {
        $this->pergunta = $pergunta;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Uma nova pergunta foi feita.')
            ->action('Ver Pergunta', url('/comentarios/resposta/' . $this->pergunta->id))
            ->line('Obrigado por usar nossa aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
