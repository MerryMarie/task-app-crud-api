<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TaskFilter extends AbstractFilter
{
    public const STATUS_ID = 'status_id';
    public const DEADLINE_AT = 'deadline_at';
    public const DEADLINE_BEFORE = 'deadline_before';
    public const DEADLINE_AFTER = 'deadline_after';


    protected function getCallbacks(): array
    {
        return [
            self::STATUS_ID => [$this, 'statusId'],
            self::DEADLINE_AT => [$this, 'deadlineAt'],
            self::DEADLINE_BEFORE => [$this, 'deadlineBefore'],
            self::DEADLINE_AFTER => [$this, 'deadlineAfter'],
        ];
    }

    public function statusId(Builder $builder, $value)
    {
        $builder->where('status_id', $value);
    }

    public function deadlineAt(Builder $builder, $value)
    {
        $builder->whereDate( 'deadline_at', $value );
    }
    public function deadlineAfter(Builder $builder, $value)
    {
        $builder->whereDate( 'deadline_at', '>=', $value );
    }
    public function deadlineBefore(Builder $builder, $value)
    {
        $builder->whereDate( 'deadline_at', '<=', $value );
    }
}