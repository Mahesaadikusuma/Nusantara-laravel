<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRateDestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_user' => 'nullable|exists:users,id',
            "id_destinations" => 'nullable|exists:destinations,id',
            'name' => 'required|string|max:100',
            'rating_destination' => 'nullable|integer|min:1|max:5',
            'comment_destination' => 'nullable|string|max:255',
            'id_artikel_destinations' => 'nullable|exists:article_destinations,id',
            'rating_artikel_destination' => 'nullable|integer|min:1|max:5',
            'comment_artikel_destination' => 'nullable|string|max:255',
            'id_event_destinations' => 'nullable|exists:event_destinations,id',
            'rating_event_destination' => 'nullable|integer|min:1|max:5',
            'comment_event_destination' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Nama Wajib Di Isi ",
            'name.max' => "Nama tidak boleh lebih dari 100 karakter",
            'rating_destination.max' => "Rating Destination tidak boleh lebih dari 5",
            'rating_destination.integer' => "Rating Destination harus angka",

            'rating_artikel_destination.max' => "Rating Artikel Destination tidak boleh lebih dari 5",
            'rating_artikel_destination.integer' => "Rating Artikel harus angka",

            'rating_event_destination.max' => "Rating Event Destination tidak boleh lebih dari 5",
            'rating_event_destination.integer' => "Rating Event Destination harus angka",
            
            'comment_destination.max' => "Comment Destination tidak boleh lebih dari 255 karakter",
            'comment_artikel_destination.max' => "Comment Artikel Destination tidak boleh lebih dari 255 karakter",
            'comment_event_destination.max' => "Comment Event Destination tidak boleh lebih dari 255 karakter",

        ];
    }
}
