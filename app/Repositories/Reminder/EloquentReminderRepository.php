<?php
declare(strict_types = 1);

namespace App\Repositories\Reminder;

use App\Models\Reminder\EloquentReminder;

/**
 * Class EloquentReminderRepository
 *
 * @author  D3lph1 <d3lph1.contact@gmail.com>
 * @package App\Repositories\Reminder
 */
class EloquentReminderRepository implements ReminderRepositoryInterface
{
    public function deleteByUser(int $userId): bool
    {
        return (bool)EloquentReminder::where('user_id', $userId)->delete();
    }

    public function truncate(): void
    {
        EloquentReminder::truncate();
    }
}
