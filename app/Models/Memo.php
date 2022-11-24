<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Memo extends Model implements HasMedia
{
    protected $table = 'memo';

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'odependency_id',
        'number_memo',
        'ref_obs',
        'date_doc',
        'date_entry',
        'date_exit',
        'ddependency_id',
        'admin_user_id',

    ];


    protected $dates = [
        'date_doc',
        'date_entry',
        'date_exit',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['imagen'];


    function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            //->accepts('image/*')
            ->maxFilesize(2 * 2048 * 2048)
            ->maxNumberOfFiles(10);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        /*$this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('gallery');*/
        $this->autoRegisterThumb200();
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/memos/'.$this->getKey());
    }

    public function imagen()
    {
        return $this->belongsTo('App\Models\Medium', 'id', 'model_id');

    }
}
