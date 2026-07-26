<?php

namespace App\Http\Controllers\Site\Consultations;

use App\Http\Controllers\BaseComponent;
use App\Models\ConsultationRequest;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FreeConsultation extends BaseComponent
{
    public $full_name;
    public $phone;
    public $email;
    public $description;

    public function mount(SettingRepositoryInterface $settingRepository)
    {
        $title = $settingRepository->getRow('title') . ' - مشاوره رایگان';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($settingRepository->getRow('seoDescription'));
        SEOMeta::addKeyword($settingRepository->getRow('seoKeyword', []));
        OpenGraph::setUrl(url()->current());
        OpenGraph::setTitle($title);
        OpenGraph::setDescription($settingRepository->getRow('seoDescription'));
        TwitterCard::setTitle($title);
        TwitterCard::setDescription($settingRepository->getRow('seoDescription'));
        JsonLd::setTitle($title);
        JsonLd::setDescription($settingRepository->getRow('seoDescription'));
        JsonLd::addImage(asset($settingRepository->getRow('logo')));

        $this->page_address = [
            'home' => ['link' => route('home'), 'label' => 'فکور'],
            'consultation' => ['link' => '', 'label' => 'مشاوره رایگان'],
        ];

        if (Auth::check()) {
            $this->full_name = Auth::user()->name;
            $this->phone = Auth::user()->phone;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('site.consultations.free-consultation')->extends('site.layouts.site.site');
    }

    public function store()
    {
        $this->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:120'],
            'description' => ['nullable', 'string', 'max:2000'],
        ], [], [
            'full_name' => 'نام و نام خانوادگی',
            'phone' => 'شماره تماس',
            'email' => 'ایمیل',
            'description' => 'توضیحات درباره موضوع مشاوره',
        ]);

        if (rateLimiter(value: request()->ip() . '_free_consultation', max_tries: 5)) {
            return $this->emitNotify('تعداد درخواست‌ها زیاد است. لطفا کمی بعد دوباره تلاش کنید.', 'warning');
        }

        try {
            ConsultationRequest::create([
                'full_name' => $this->full_name,
                'phone' => $this->phone,
                'email' => $this->email,
                'description' => $this->description,
            ]);

            $this->reset(['description']);
            return $this->emitNotify('درخواست مشاوره رایگان با موفقیت ثبت شد');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $this->emitNotify('خطا در هنگام ثبت درخواست مشاوره', 'warning');
        }
    }
}
