<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $defaults = [
            'seo_meta_description' => 'FASTQARD helps professionals and businesses create smart Digital Business Cards with NFC and QR Code technology. Share your contact details instantly, generate leads, and grow your network.',
            'seo_meta_keywords' => 'FASTQARD, FastCard, Digital Business Card, Digital Visiting Card, NFC Business Card, NFC Card India, QR Code Business Card, Smart Business Card, Virtual Business Card, Digital VCard, Online Business Card, Business Card Maker, Electronic Business Card, Paperless Business Card, Contact Sharing Solution, Professional Networking, Digital Profile, WhatsApp Business Card, Lead Generation Card, Digital Card SaaS, NFC Visiting Card, QR Business Card India',
            'seo_author' => 'FASTQARD',
            'seo_copyright' => 'FASTQARD by Maptek Softwares LLP',
            'seo_robots' => 'index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1',
            'seo_googlebot' => 'index, follow',
            'seo_geo_region' => 'IN-MH',
            'seo_theme_color' => '#0a0a0a',
            'seo_canonical' => 'https://www.fastqard.com/',
            'seo_og_type' => 'website',
            'seo_og_url' => 'https://www.fastqard.com/',
            'seo_og_title' => 'FASTQARD - Smart Digital Business Cards with NFC & QR Code',
            'seo_og_description' => 'Create professional Digital Business Cards with NFC and QR technology. Share contact details instantly and grow your business network.',
            'seo_og_image' => 'https://www.fastqard.com/assets/images/fastqard-og-image.jpg',
            'seo_og_locale' => 'en_IN',
            'seo_og_site_name' => 'FASTQARD',
            'seo_twitter_card' => 'summary_large_image',
            'seo_twitter_url' => 'https://www.fastqard.com/',
            'seo_twitter_title' => 'FASTQARD - Digital Business Cards, NFC Cards & QR Cards',
            'seo_twitter_description' => 'Create, share and manage smart Digital Business Cards using NFC and QR Code technology.',
            'seo_twitter_image' => 'https://www.fastqard.com/assets/images/fastqard-og-image.jpg',
            'seo_application_name' => 'FASTQARD',
            'seo_apple_title' => 'FASTQARD',
            'seo_format_detection' => 'telephone=no',
            'seo_distribution' => 'global',
            'seo_rating' => 'general',
            'seo_revisit_after' => '1 days',
            'seo_language' => 'English',
        ];

        foreach ($defaults as $key => $value) {
            DB::table('config')->updateOrInsert(
                ['config_key' => $key],
                ['config_value' => $value]
            );
        }
    }

    public function down(): void
    {
        DB::table('config')->whereIn('config_key', [
            'seo_meta_description', 'seo_meta_keywords', 'seo_author', 'seo_copyright',
            'seo_robots', 'seo_googlebot', 'seo_geo_region', 'seo_theme_color',
            'seo_canonical', 'seo_og_type', 'seo_og_url', 'seo_og_title',
            'seo_og_description', 'seo_og_image', 'seo_og_locale', 'seo_og_site_name',
            'seo_twitter_card', 'seo_twitter_url', 'seo_twitter_title',
            'seo_twitter_description', 'seo_twitter_image', 'seo_application_name',
            'seo_apple_title', 'seo_format_detection', 'seo_distribution',
            'seo_rating', 'seo_revisit_after', 'seo_language',
        ])->delete();
    }
};
