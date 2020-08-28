<?php


namespace App\Traits;

trait Messaging
{
  public function markAsRead($messageId)
  {
    $this->messages()->updateExistingPivot($messageId, ['read' => true]);
  }

  public function sendMessage($messageId)
  {
    return $this->messages()->attach($messageId);
  }
}