<?php

namespace App\Modifiers;

use Spatie\Image\Enums\BorderType;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductMediaDefinitions implements \Lunar\Base\MediaDefinitionsInterface
{
    public function registerMediaConversions(HasMedia $model, Media $media = null): void
    {
        // Add a conversion for the admin panel to use
        $model->addMediaConversion('small')
            ->fit(Fit::Max, 210, 210)
            ->border(0, BorderType::Overlay, color: '#FFF')
            ->sharpen(10)
            ->keepOriginalImageFormat();
    }

    public function registerMediaCollections(HasMedia $model): void
    {
        $fallbackUrl = config('lunar.media.fallback.url');
        $fallbackPath = config('lunar.media.fallback.path');

        // Reset to avoid duplication
        $model->mediaCollections = [];

        $collection = $model->addMediaCollection(
            config('lunar.media.collection')
        );

        if ($fallbackUrl) {
            $collection = $collection->useFallbackUrl($fallbackUrl);
        }

        if ($fallbackPath) {
            $collection = $collection->useFallbackPath($fallbackPath);
        }

        $this->registerCollectionConversions($collection, $model);
    }

    protected function registerCollectionConversions(MediaCollection $collection, HasMedia $model): void
    {
        $conversions = [
            'large' => [
                'width' => 720,
                'height' => 1028,
            ],
            'medium' => [
                'width' => 300,
                'height' => 428,
            ],
        ];

        $collection->registerMediaConversions(function (Media $media) use ($model, $conversions) {
            foreach ($conversions as $key => $conversion) {
                $model->addMediaConversion($key)
                    ->fit(Fit::Crop, $conversion['width'], $conversion['height'])
                    ->keepOriginalImageFormat();
            }
        });
    }

    public function getMediaCollectionTitles(): array
    {
        return [
            'images' => __('lunar::base.standard-media-definitions.collection-titles.images'),
        ];
    }

    public function getMediaCollectionDescriptions(): array
    {
        return [
            'images' => '',
        ];
    }
}