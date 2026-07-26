<?php

namespace App\Http\Controllers\Admin\Consultations;

use App\Http\Controllers\BaseComponent;
use App\Models\ConsultationRequest;
use Livewire\WithPagination;

class IndexConsultation extends BaseComponent
{
    use WithPagination;

    public $checked = '';
    public $placeholder = 'نام، شماره تماس، ایمیل یا توضیحات';

    protected $queryString = ['checked'];

    public function mount()
    {
        $this->data['checked'] = [
            '' => 'همه',
            '0' => 'بررسی نشده',
            '1' => 'بررسی شده',
        ];
    }

    public function render()
    {
        $this->authorizing('show_contacts');

        $consultations = ConsultationRequest::latest('id')
            ->when($this->checked !== '', function ($query) {
                return $query->where('checked', (bool) $this->checked);
            })
            ->when($this->search, function ($query) {
                return $query->where(function ($query) {
                    $query->where('full_name', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate($this->per_page);

        return view('admin.consultations.index-consultation', [
            'consultations' => $consultations,
        ])->extends('admin.layouts.admin');
    }

    public function toggleChecked($id)
    {
        $this->authorizing('edit_contacts');
        $consultation = ConsultationRequest::findOrFail($id);
        $consultation->checked = ! $consultation->checked;
        $consultation->save();
    }

    public function delete($id)
    {
        $this->authorizing('delete_contacts');
        ConsultationRequest::destroy($id);
    }
}
