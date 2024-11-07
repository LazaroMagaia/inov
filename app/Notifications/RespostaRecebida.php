<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Respostas as Resposta;
class RespostaRecebida extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $resposta;

    public function __construct(Resposta $resposta)
    {
        $this->resposta = $resposta;
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
            ->line('Sua pergunta foi respondida.')
            ->action('Ver Resposta', url('/comentarios/resposta/' . $this->resposta->perguntas_id))
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
