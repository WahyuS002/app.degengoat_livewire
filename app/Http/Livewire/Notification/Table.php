<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;

class Table extends Component
{
    public $non_active_notifications;
    public $active_notification;

    protected $listeners = ['notificationAdded' => 'refreshData'];

    public function render()
    {
        return view('livewire.notification.table');
    }

    public function mount()
    {
         $this->non_active_notifications = Notification::nonActive()->latest()->get();
         $this->active_notification = Notification::active()->first();
    }

    public function refreshData()
    {
        $this->non_active_notifications = Notification::nonActive()->latest()->get();
        $this->active_notification = Notification::active()->first();
    }
}
