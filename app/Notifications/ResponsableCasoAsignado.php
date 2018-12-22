<?php

namespace App\Notifications;

use App\Models\Caso;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResponsableCasoAsignado extends Notification
{
    use Queueable;

    protected $caso;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Caso $caso)
    {
        $this->caso = $caso;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage())
            ->subject("Asignación Caso")
            ->greeting("Hola {$notifiable->name},")
            ->line("Has sido asignado como responsable de un caso {$this->caso->anio_rol}-{$this->caso->rol} en {$this->caso->corte->nombre}")
            ->line("Datos intervinientes")
            ->line("Cliente: {$this->caso->getNombreCompleto($this->caso->cliente)}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
