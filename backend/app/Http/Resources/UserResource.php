<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role' => $this->role,
            'full_name' => $this->profile?->full_name ?? 'Admin', // Ketika admin login maka tidak punya full_name, sehingga kita set default value menjadi 'Admin',
            'photo_url' => $this->profile?->photo_path ? url(Storage::url($this->profile->photo_path)) : null,
            'profile' => $this->profile ? [
                'nis' => $this->profile->nis ?? null,
                'nip' => $this->profile->nip ?? null,
                'academic_title' => $this->profile->academic_title ?? null,
                'class_id' => $this->profile->class_id ?? null,
            ] : null,
        ];
    }
}
