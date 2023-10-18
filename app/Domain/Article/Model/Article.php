<?php

namespace App\Domain\Article\Model;

use App\Domain\ClinicDates\Model\ClinicDates;
use App\Domain\Organization\Model\Organization;
use App\Domain\Participant\Model\Participant;
use App\Domain\Schedule\Model\Schedule;
use App\Domain\Service\Model\Service;
use App\Domain\Staff\Model\Staff;
use App\Domain\SubLocation\Model\SubLocation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';
    protected $fillable = ['address', 'body' ,'status', 'user_id'];

}
