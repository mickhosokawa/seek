<?php //declare(strict_types=1);

namespace App\Enums;

//use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
enum JobType: int
{
    case FULL_TIME = 0;
    case PART_TIME = 1;
    case CONTRACT_TEMPORARY = 2;
    case CASUAL_VACATION = 3;

    public function label(): string
    {
        return match($this)
        {
            JobType::FULL_TIME => 'Full time',
            JobType::PART_TIME => 'Part time',
            JobType::CONTRACT_TEMPORARY => 'Contract or Temporary',
            JobType::CASUAL_VACATION => 'Casual or Vacation',
        };
    }
}
