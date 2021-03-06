<?php

namespace App\REST;

use Illuminate\Database\Eloquent\Model;

/**
 * App\REST\Image
 *
 * @property int $id
 * @property string $image_src
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\PivotPostImage[] $pivotPostImages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\REST\Post[] $posts
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Image whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Image whereImageSrc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\REST\Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Image extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Table Name.
     *
     * @var string
     */
    protected $table = 'images';

    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
    protected $fillable = [
        'image_src', 
		'created_at', 
		'updated_at', 
		
    ];

    

    

	/**
     * pivotPostImages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pivotPostImages()
    {
        return $this->hasMany('App\REST\PivotPostImage', 'image_id');
    }

    

	/**
     * Posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(
            'App\REST\Post',
            'pivot_post_image',
            'image_id',
            'post_id');
    }
}
