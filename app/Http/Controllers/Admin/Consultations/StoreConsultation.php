<?php

namespace App\Http\Controllers\Admin\Consultations;

use App\Http\Controllers\BaseComponent;
use App\Models\ConsultationRequest;

class StoreConsultation extends BaseComponent
{
    public $consultation;
    public $checked = false;
    public $header;

    public function mount($action, $id = null)
    {
        $this->authorizing('show_contacts');
        $this->set_mode($action);

        if ($this->mode == self::UPDATE_MODE) {
            $this->consultation = ConsultationRequest::findOrFail($id);
            $this->checked = $this->consultation->checked;
            $this->header = 'درخواست مشاوره';
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('admin.consultations.store-consultation')->extends('admin.layouts.admin');
    }

    public function store()
    {
        $this->authorizing('edit_contacts');
        $this->validate([
            'checked' => ['boolean'],
        ], [], [
            'checked' => 'وضعیت بررسی',
        ]);

        $this->consultation->checked = (bool) $this->checked;
        $this->consultation->save();

        return $this->emitNotify('وضعیت درخواست با موفقیت ذخیره شد');
    }

    public function deleteItem()
    {
        $this->authorizing('delete_contacts');
        $this->consultation->delete();

        return redirect()->route('admin.consultation');
    }
}
